<?php

namespace controller;

use model\dao\ProgramDao;
use model\dao\TicketsDao;
use model\Tickets;
use model\TakenSeats;
use model\User;
use model\TicketInfo;

class TicketsController {

    /**
     * Display seats page
     * ?target=tickets&action=showSeats&id=3&indexScreen=1&day=2019-03-07
     * - target string
     * - action string
     * - id integer - ProgramID
     * - indexScreen integer - Screen Slot Number
     * - day YYYY-MM-DD - Date should be bigger than today
     * call showSeats.tpl or Error Page in case of not valid data coming from GET
     * @return void
     */
    public function showSeats (){
        if (isset($_GET["id"], $_GET["indexScreen"], $_GET["day"])){
            $programId = $_GET["id"];
            $slot = $_GET["indexScreen"];
            $date = $_GET["day"];
            $hour = $_GET["hour"];
            //take count of rows and seats of each row
            $result = TicketsDao::getRowsAndSeats($programId);
            //taken is array of objects - two parameters - number of row and seat of taken seat
            $taken = TicketsDao::getTakenSeats($programId, $slot, $date);
            //if get parameters are not valid or there is no hall for program id - go to error page
            if ($this->isValidSlot($slot, $date) && $date >= date("Y-m-d")){
                if($result != null){
                    //make empty arrays with rows and seats
                    $rows = $this->makeEmptyArray($result["hall_rows"]);
                    $seatsPerRow = $this->makeEmptyArray($result["seats"]);
                    //make matrix where taken seat = 1
                    $takenSeats =[];
                    foreach ($taken AS $take){
                        if(!isset($takenSeats[$take->getRow()])){
                            $takenSeats[$take->getRow()] = [];
                        }
                        $takenSeats[$take->getRow()][$take->getSeat()] = 1;
                    }
                    $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
                    $GLOBALS["smarty"]->assign('id', $_GET["id"]);
                    $GLOBALS["smarty"]->assign('slot', $_GET["indexScreen"]);
                    $GLOBALS["smarty"]->assign('day', $_GET["day"]);
                    $GLOBALS["smarty"]->assign('rows', $rows);
                    $GLOBALS["smarty"]->assign('hour', $hour);
                    $GLOBALS["smarty"]->assign('seats', $seatsPerRow);
                    $GLOBALS["smarty"]->assign('takenSeats', $takenSeats);
                    $GLOBALS["smarty"]->display('showSeats.tpl');
                }
                else {
                    $this->goToErrorPage();
                }
            }
            else {
                $this->goToErrorPage();
            }
        }
        else {
            $this->goToErrorPage();
        }
    }

    /**
     *Insert bought tickets in DB trow TicketsDao
     * If success - call boughtTickets.tpl, else - call badValues.tpl
     */
    public function buyTickets (){
        //only logged user can buy ticket. If not logged - redirect to UserController - login
        if (!isset($_SESSION["user"])){
            header("Location: ".BASE_PATH."?target=user&action=login");
        }
        else {
            if (isset($_POST, $_POST["day"], $_POST["programId"], $_POST["slot"], $_POST["seat"])){
                $date = $_POST["day"];
                $programId = $_POST["programId"];
                $slot = $_POST["slot"];
                $seats = $_POST["seat"];
                $hour = $_POST["hour"];
                $price = TicketsDao::getPrice($programId)["price"];
                $userId = $_SESSION["user"]->getId();
                $result = TicketsDao::buyTickets($date, $price, $userId, $programId, $slot, $seats);
                //if buy ticket is not successful - go to error page, else - go to page with tickets
                if ($result == null){
                    $this->goToErrorPage();
                }
                else {
                    $successMsg = $this->mailUser($date, $price, $programId, $result, $hour);
                    $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
                    $GLOBALS["smarty"]->assign('msg', $successMsg);
                    $GLOBALS["smarty"]->display('boughtTickets.tpl');
                }
            }
            else {
                $this->goToErrorPage();
            }
        }
    }

    /**
     * Collect all information about bought tickets and send it to user by email
     *
     * @param $date
     * @param $price
     * @param $programId
     * @param $result - count of bought tickets and row-seat for every ticket
     * @return string - message with info for tickets (movie, price, date, seat, hall, cinema)
     */
    public function mailUser($date, $price, $programId, $result, $hour){
        $ticketsCount = $result["countTickets"];
        $msg = "<h1>You bought $ticketsCount tickets. </h1><table cellpadding='4'>";
        for ($i = 0; $i < $ticketsCount; $i++){
            $infoRes = TicketsDao::getTicketInfo($programId);
            $seat = $result["seats"][$i];
            $movie = $infoRes[0]->getMovieName();
            $hall = $infoRes[0]->getHallType();
            $cinema = $infoRes[0]->getCinemaName();

            $link = urlencode("Movie: $movie \r\n Seat:$seat \r\n Hall: $hall\r\n Cinema: $cinema\r\n Hour: $hour");
            $msg .= "<tr><td valign='middle'>Ticket " . ($i+1) . " is for movie: $movie, in hall: $hall, cinema: $cinema,
            price is: $price, for data: $date, row and seat: $seat </td><td>
            <img src=\"https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=$link&choe=UTF-8\" /></td></tr>";

        }
        $msg .= "</table>";
        $email =  $_SESSION["user"]->getEmail();
        //generate code
        //<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=
        //{BASE_PATH}?target=tickets&action=list&id=156&choe=UTF-8" title="Link to Google.com" />

        if (BASE !== 'localhost') {
            mail("$email", 'Tickets', $msg, "From: kino");
        }

        return $msg;
    }

    /**
     * Get all tickets, that logged user is bought and call myTickets.tpl
     */
    public function myTickets(){
        $id = $_SESSION["user"]->getId();
        $tickets = TicketsDao::getMyTickets($id);
        if ($tickets == null){
            $this->goToErrorPage();
        }
        else {
            $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
            $GLOBALS["smarty"]->assign('tickets', $tickets);
            $GLOBALS["smarty"]->display('myTickets.tpl');
        }
    }

    /**
     * call badValues.tpl
     */
    public function goToErrorPage (){
        $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
        $GLOBALS["smarty"]->display('badValues.tpl');
    }

    /**
     * @param $string
     * @return array
     */
    public function makeEmptyArray ($string){
        $result = [];
        for ($i = 0; $i < $string; $i++){
            $result[]= 0;
        }
        return $result;
    }

    /**
     * @param $slot
     * @param $date
     * @return bool
     */
    public  function isValidSlot ($slot, $date){
        $programByDate = ProgramDao::getAllByDate($date);
        if ($slot >= 0 && $slot == intval($slot) && $slot <= count($programByDate)){
            return true;
        }
        else {
            return false;
        }
    }
}

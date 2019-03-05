<?php

namespace controller;

use model\dao\ProgramDao;
use model\dao\TicketsDao;
use model\Tickets;
use model\TakenSeats;
use model\User;

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


    public function buyTickets (){
        //only logged user can buy ticket. If not logged - redirect to UserController
        if (!isset($_SESSION["user"])){
            header("Location: ".BASE_PATH."?target=user&action=login");
        }
        else {
            if (isset($_POST, $_POST["day"], $_POST["programId"], $_POST["slot"], $_POST["seat"])){
                $date = $_POST["day"];
                $programId = $_POST["programId"];
                $slot = $_POST["slot"];
                $seats = $_POST["seat"];
                $result = TicketsDao::getPrice($programId);
                $price = $result["price"];
                $userId = $_SESSION["user"]->getId();;
                $result = TicketsDao::buyTickets($date, $price, $userId, $programId, $slot, $seats);
                //if buy ticket is not successful - go to error page, else - go to page with tickets
                if ($result == null){
                    $this->goToErrorPage();
                }
                else {

                    $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
                    $GLOBALS["smarty"]->display('myTickets.tpl');
                }
            }
            else {
                $this->goToErrorPage();
            }
        }
    }

    public function goToErrorPage (){

        $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
        $GLOBALS["smarty"]->display('badValues.tpl');
    }

    public function makeEmptyArray ($string){
        $result = [];
        for ($i = 0; $i < $string; $i++){
            $result[]= 0;
        }
        return $result;
    }

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

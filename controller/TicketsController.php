<?php


namespace controller;


use model\dao\ProgramDao;
use model\dao\TicketsDao;
use model\Tickets;
use model\TakenSeats;
use model\User;

class TicketsController {

    public function showSeats (){
        $msg = "";
        if (isset($_GET["id"], $_GET["slot"], $_GET["day"])){
            $programId = $_GET["id"];
            $slot = $_GET["slot"];
            $date = $_GET["day"];
            $result = TicketsDao::getRowsAndSeats($programId);
            $taken = TicketsDao::getTakenSeats($programId, $slot, $date);
            if ($this->isValidSlot($slot, $date) && $date >= date("Y-m-d")){
                if($result != null){
                    $rows = $this->strToArr($result["hall_rows"]);
                    $seatsPerRow = $this->strToArr($result["seats"]);
                    $takenSeats =[];
                    foreach ($taken AS $take){
                        if(!isset($takenSeats[$take->getRow()])){
                            $takenSeats[$take->getRow()] = [];
                        }
                        $takenSeats[$take->getRow()][$take->getSeat()] = 1;
                    }

                    require (URI.'smartyHeader.php');
                    $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
                    $smarty->assign('BASE_PATH', BASE_PATH);
                    $smarty->assign('id', $_GET["id"]);
                    $smarty->assign('slot', $_GET["slot"]);
                    $smarty->assign('day', $_GET["day"]);
                    $smarty->assign('rows', $rows);
                    $smarty->assign('seats', $seatsPerRow);
                    $smarty->assign('takenSeats', $takenSeats);
                    $smarty->display('showSeats.tpl');
                }
                else {
                    require (URI.'smartyHeader.php');
                    $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
                    $smarty->assign('BASE_PATH', BASE_PATH);
                    $smarty->display('badValues.tpl');
                }
            }
            else {
                require (URI.'smartyHeader.php');
                $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
                $smarty->assign('BASE_PATH', BASE_PATH);
                $smarty->display('badValues.tpl');
            }
        }
        else {
            require (URI.'smartyHeader.php');
            $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
            $smarty->assign('BASE_PATH', BASE_PATH);
            $smarty->display('badValues.tpl');
        }
    }



    public function buyTickets (){

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
                if ($result == null){
                    require (URI.'smartyHeader.php');
                    $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
                    $smarty->assign('BASE_PATH', BASE_PATH);
                    $smarty->display('badValues.tpl');
                }
                else {
                    require (URI.'smartyHeader.php');
                    $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
                    $smarty->assign('BASE_PATH', BASE_PATH);
                    $smarty->display('myTickets.tpl');
                }
            }
            else {
                require (URI.'smartyHeader.php');
                $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
                $smarty->assign('BASE_PATH', BASE_PATH);
                $smarty->display('badValues.tpl');
            }
        }

    }

    public function strToArr ($string){
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
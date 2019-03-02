<?php


namespace controller;


use model\dao\TicketsDao;
use model\Tickets;
use model\TakenSeats;
use model\User;

class TicketsController {

    public function showSeats (){
//TODO validate GET
        if (isset($_GET["id"])){
            $programId = $_GET["id"];
            $result = TicketsDao::getRowsAndSeats($programId);
            $rows = $result["hall_rows"];
            $seatsPerRow = $result["seats"];

            $taken = TicketsDao::getTakenSeats($programId, $_GET["slot"], $_GET["day"]);
            $takenSeats =[];
            foreach ($taken AS $take){
                if(!isset($takenSeats[$take->getRow()])){
                    $takenSeats[$take->getRow()] = [];
                }
                $takenSeats[$take->getRow()][$take->getSeat()] = 1;
            }

            require_once URI."view/showSeats.php";
        }


    }

    public function buyTickets (){
        if (isset($_POST)){

            //TODO take price and user_id
            $date = $_POST["day"];
            $programId = $_POST["programId"];
            $slot = $_POST["slot"];
            $seats = $_POST["seat"];
            $price = 10;
            $userId = 5;
//TODO add something
            $result = TicketsDao::buyTickets($date, $price, $userId, $programId, $slot, $seats);
            if ($result == null){
                echo "error";
            }
            else {
                echo "uraa";
            }
        }
    }
}
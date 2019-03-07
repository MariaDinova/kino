<?php

namespace model\dao;

use model\Tickets;
use model\TakenSeats;
use model\TicketInfo;

class TicketsDao {

    /**
     * @param $programId
     * @return string - count of rows and seats in chosen hall
     */
    public static function getRowsAndSeats ($programId){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT seats, hall_rows FROM programs LEFT JOIN halls ON programs.hall_id=halls.hall_id
                                          WHERE programs.program_id=?");
        $stmt->execute(array($programId));
        if($stmt->rowCount() == 0){
            return null;
        }
        else {
            $row = $stmt->fetch();
            return $row;
        }
    }

    /**
     * @param $programId
     * @param $slot - number of screening
     * @param $date
     * @return array - taken seats
     */
    public static function getTakenSeats ($programId, $slot, $date){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT hall_row, seat FROM tickets WHERE program_id =? AND slots=? AND date=?");
        $stmt->execute(array($programId, $slot, $date));
        $takenSeats = [];
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $takenSeat = new TakenSeats($row->hall_row,$row->seat);
            $takenSeats[]=$takenSeat;
        }
        return $takenSeats;
    }

    /**
     * Insert in DB info for bought tickets
     *
     * @param $date
     * @param $price
     * @param $userId
     * @param $programId
     * @param $slot
     * @param $seats
     * @return array - count of bought tickets and row:seat for each of them
     */
    public static function buyTickets($date, $price,$userId, $programId, $slot, $seats, $hour){
        $pdo = DBConnection::getSingletonPDO();
        $sql = "INSERT INTO tickets(date, ticket_price, user_id, slots, program_id, hall_row, seat, start_hour) VALUES ";
        for ($i = 0; $i < count($seats); $i++){
            list ($row, $seat) = explode(':', $seats[$i]);
            $values[]= "('$date', $price, $userId, $slot, $programId, $row, $seat, '$hour')";
        }
        $sql .= join(',', $values);
        try{
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $countTickets = $stmt->rowCount();
            $result["countTickets"] = $countTickets;
            $result["seats"] = $seats;
            return $result;
        }
        catch (\PDOException $e){
            return null;
        }
    }

    /**
     * @param $programId
     * @return double $price
     */
    public static function getPrice ($programId){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT price FROM movies LEFT JOIN programs ON programs.movie_id=movies.movie_id
                                WHERE programs.program_id=?");
        $stmt->execute(array($programId));
        return $stmt->fetch();
    }

    /**
     * @param $programId
     * @return array - info about bought tickets (movie, hall, cinema, start hour, movie slot)
     */
    public static function getTicketInfo($programId){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT movie_name, type AS hall_type, cinema_name, hour_start, slot AS movie_slot FROM programs
                                        LEFT JOIN movies ON programs.movie_id=movies.movie_id
                                        LEFT JOIN halls ON programs.hall_id=halls.hall_id
                                        LEFT JOIN hall_types ON halls.hall_type_id=hall_types.hall_type_id
                                        LEFT JOIN cinema ON halls.cinema_id=cinema.cinema_id
                                        WHERE programs.program_id=?");
        $stmt->execute(array($programId));
        $ticketsInfo = [];
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $info = new TicketInfo($row->movie_name,$row->hall_type, $row->cinema_name,$row->hour_start,$row->movie_slot);
            $ticketsInfo[]=$info;
        }
        return $ticketsInfo;
    }

    /**
     * @param $id - logged user id
     * @return array - all tickets that user is bought
     */
    public static function getMyTickets ($id){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT date, price, hall_row, seat, start_hour, movie_name, type, cinema_name
                                        FROM tickets
                                        LEFT JOIN programs ON tickets.program_id=programs.program_id
                                        LEFT JOIN movies ON programs.movie_id=movies.movie_id
                                        LEFT JOIN halls ON programs.hall_id=halls.hall_id
                                        LEFT JOIN hall_types ON halls.hall_type_id=hall_types.hall_type_id
                                        LEFT JOIN cinema ON halls.cinema_id=cinema.cinema_id
                                        WHERE user_id=?
                                        ORDER BY date");
        $stmt->execute(array($id));
        $myTickets = [];

        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $myTicket = new Tickets($row->date,$row->price, $row->hall_row,$row->seat,$row->start_hour, $row->movie_name,$row->type,$row->cinema_name);
            $myTickets[]=$myTicket;
        }
        return $myTickets;
    }
}


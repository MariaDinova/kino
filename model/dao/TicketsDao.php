<?php


namespace model\dao;
use model\Tickets;
use model\TakenSeats;

class TicketsDao {
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

    public static function buyTickets($date, $price,$userId, $programId, $slot, $seats){
        $pdo = DBConnection::getSingletonPDO();
        $sql = "INSERT INTO tickets(date, price, user_id, slots, program_id, hall_row, seat) VALUES ";

        for ($i = 0; $i < count($seats); $i++){
            list ($row, $seat) = explode(':', $seats[$i]);
            //TODO escape values
            $values[]= "('$date', $price, $userId, $slot, $programId, $row, $seat)";

        }
        $sql .= join(',', $values);
        try{
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $countTickets = $stmt->rowCount();
            return $countTickets;
        }
        catch (\PDOException $e){
            return null;
        }
    }

    public static function getPrice ($programId){
        $pdo = DBConnection::getSingletonPDO();

        $stmt = $pdo->prepare("SELECT price FROM movies LEFT JOIN programs ON programs.movie_id=movies.movie_id
                                WHERE programs.program_id=?");
        $stmt->execute(array($programId));
        return $stmt->fetch();
    }
}
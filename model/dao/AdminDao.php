<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2/24/2019
 * Time: 9:27 PM
 */

namespace model\dao;


use model\Halls;
use model\HallTypes;
use model\Movie;

class AdminDao{
    public static function getAllMovies(){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT m.movie_id, m.movie_name, m.description, t.movie_type, m.image_uri, m.trailer_uri, age.restriction, m.price, m.duration, m.slot
                                        FROM movies AS m
                                        JOIN movie_type AS t
                                        ON m.movie_type_id = t.movie_type_id
                                        JOIN age_restriction AS age
                                        ON m.age_rest_id = age.age_rest_id
                                        ORDER BY m.movie_name;");
        $stmt->execute();
        $movies = [];
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)){
                $movie = new Movie($row->movie_id,$row->movie_name,$row->description,$row->movie_type,
                    $row->image_uri,$row->trailer_uri,$row->restriction,$row->price, $row->duration, $row->slot);
                $movies[]=$movie;
            }
            return $movies;
        }

    public static function getAllHalls(){

        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT halls.hall_id, cinema.cinema_name, hall_types.type, halls.seats, halls.hall_rows 
                                        FROM halls
                                        LEFT JOIN hall_types 
                                        ON halls.hall_type_id=hall_types.hall_type_id
                                        JOIN cinema
                                        ON cinema.cinema_id = halls.cinema_id;");
        $stmt->execute();
        $halls = [];
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $hall = new Halls($row->hall_id,$row->cinema_name,$row->type,$row->seats, $row->hall_rows);
            $halls[]=$hall;
        }
        return $halls;
    }

    public static function getAllHallTypes(){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT hall_type_id, type FROM hall_types");
        $stmt->execute();
        $hall_types = [];
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $hallType = new HallTypes($row->hall_type_id,$row->type);
            $hall_types[]=$hallType;
        }
        return $hall_types;
    }



    public static function insertMovie($movie_name, $description, $movie_type_id, $image_uri, $trailer_uri, $age_rest_id, $price, $duration, $slot ){
        $pdo = DBConnection::getSingletonPDO();
        try {
            $stmt = $pdo->prepare("INSERT INTO movies (movie_name, description, movie_type_id,
                                                                image_uri, trailer_uri, age_rest_id,
                                                                price, duration, slot) 
                                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);");
            $stmt->execute(array($movie_name, $description, $movie_type_id, $image_uri, $trailer_uri, $age_rest_id, $price, $duration, $slot));
            return true;
            }catch (\PDOException $e){
            echo "Error" . $e->getMessage();
            return false;
        }
    }


   public static function insertRestriction($restriction){
        try {
            $pdo = DBConnection::getSingletonPDO();
            $stmt = $pdo->prepare("INSERT INTO age_restriction (restriction) VALUES (?)");
            $stmt->execute(array($restriction));
            return true;
        }catch (\PDOException $e){
            echo "Error" . $e->getMessage();
            return false;
        }
   }


   public static function updateMovie($movie_id, $movie_name, $description, $movie_type_id, $trailer_uri, $age_rest_id, $price, $duration, $slot){
        $pdo = DBConnection::getSingletonPDO();
        try {
            $stmt = $pdo->prepare("UPDATE movies 
                                        SET movie_name = ?, description = ?, movie_type_id = ?,
                                       trailer_uri = ?, age_rest_id = ?,
                                         price = ?, duration = ?, slot = ?
                                        WHERE movie_id = ?");
            $stmt->execute(array($movie_name, $description, $movie_type_id,
                $trailer_uri, $age_rest_id, $price, $duration, $slot, $movie_id));
            return true;
        }catch (\PDOException $e){
            echo "Error" . $e->getMessage();
            return false;
        }
   }


   public static function insertLocation($location){
       try {
           $pdo = DBConnection::getSingletonPDO();
           $stmt = $pdo->prepare("INSERT INTO locations (city) VALUES (?)");
           $stmt->execute(array($location));
           return true;
       }catch (\PDOException $e){
           echo "Error" . $e->getMessage();
           return false;
       }
   }

    public static function deleteMovie($movie_id){
        try {
            $pdo = DBConnection::getSingletonPDO();
            $pdo->beginTransaction();
            $stmt = $pdo->prepare("DELETE FROM programs WHERE movie_id = ?");
            $stmt->execute(array($movie_id));
            $stmt = $pdo->prepare("DELETE FROM movies WHERE movie_id = ?");
            $stmt->execute(array($movie_id));
            $pdo->commit();
            return true;
        }catch (\PDOException $e){
            echo "Error" . $e->getMessage();
            $pdo->rollBack();
            return false;
        }
 }

    public static function insertHallType($hallType){
     try {
         $pdo = DBConnection::getSingletonPDO();
         $stmt = $pdo->prepare("INSERT INTO hall_types (type) VALUES (?)");
         $stmt->execute(array($hallType));
         return true;
     }catch (\PDOException $e){
         echo "Error" . $e->getMessage();
         return false;
     }
 }

    public static function insertHall($cinema_id, $hallType_id, $seats, $hall_rows){
     try {
         $pdo = DBConnection::getSingletonPDO();
         $stmt = $pdo->prepare("INSERT INTO halls (cinema_id, hall_type_id, seats, hall_rows) VALUES (?, ?, ?, ?)");
         $stmt->execute(array($cinema_id, $hallType_id, $seats, $hall_rows));
         return true;
     }catch (\PDOException $e){
         echo "Error" . $e->getMessage();
         return false;
     }
 }

    public static function insertMovieType($movie_type){
     try {
         $pdo = DBConnection::getSingletonPDO();
         $stmt = $pdo->prepare("INSERT INTO movie_type (movie_type) VALUES (?)");
         $stmt->execute(array($movie_type));
         return true;
     }catch (\PDOException $e){
         echo "Error" . $e->getMessage();
         return false;
     }
 }

    public static function insertPeriod($start_date, $end_date){
        try {
            $pdo = DBConnection::getSingletonPDO();
            $stmt = $pdo->prepare("INSERT INTO periods (start_date, end_date) VALUES (?, ?)");
            $stmt->execute(array($start_date, $end_date));
            return true;
        }catch (\PDOException $e){
            echo "Error" . $e->getMessage();
            return false;
        }
    }


    public static function insertProgram($hall_id, $movie_id, $hour_start, $period_id, $screening){
        try {
            $pdo = DBConnection::getSingletonPDO();
            $stmt = $pdo->prepare("INSERT INTO programs (hall_id, movie_id, hour_start, period_id, screening) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute(array($hall_id, $movie_id, $hour_start, $period_id, $screening));
            return true;
        }catch (\PDOException $e){
            echo "Error" . $e->getMessage();
            return false;
        }
    }


    public static function insertTicket($cinema_id, $hall_id, $movie_id, $date, $price){
        try {
            $pdo = DBConnection::getSingletonPDO();
            $stmt = $pdo->prepare("INSERT INTO tickets (cinema_id, hall_id, movie_id, date, price) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute(array($cinema_id, $hall_id, $movie_id, $date, $price));
            return true;
        }catch (\PDOException $e){
            echo "Error" . $e->getMessage();
            return false;
        }
    }


    public static function getAllTickets(){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT DISTINCT CONCAT(u.first_name, ' ', u.last_name) as name, COUNT(DISTINCT(t.ticket_id)) AS tickets, t.user_id, t.date, t.ticket_price, c.cinema_name, m.movie_name, h.hall_id 
                                        FROM users AS u
                                        JOIN tickets as t
                                        ON u.user_id = t.user_id
                                        JOIN programs AS p
                                        ON t.program_id = p.program_id
                                        JOIN movies AS m
                                        ON p.movie_id = m.movie_id
                                        JOIN programs AS prog
                                        ON m.movie_id = prog.movie_id
                                        JOIN halls AS h
                                        ON prog.hall_id = h.hall_id
                                        JOIN cinema AS c
                                        ON h.cinema_id = c.cinema_id
                                        GROUP BY t.user_id;");
        $stmt->execute();
        $tickets = [];
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($rows as $row){
                $ticket = [];
                $ticket["name"] = $row["name"];
                $ticket["tickets"] = $row["tickets"];
                $ticket["user_id"] = $row["user_id"];
                $ticket["ticket_price"] = $row["ticket_price"];
                $ticket["cinema_name"] = $row["cinema_name"];
                $ticket["movie"] = $row["movie_name"];
                $ticket["hall_id"]= $row["hall_id"];
                $tickets[]=$ticket;
            }

        return $tickets;
    }


    public static function cancelReservation($user_id){
        try {
            $pdo = DBConnection::getSingletonPDO();
            $stmt = $pdo->prepare("DELETE FROM tickets WHERE user_id = ?");
            $stmt->execute(array($user_id));
            return true;
        }catch (\PDOException $e){
            echo "Error" . $e->getMessage();
            return false;
        }
    }



}
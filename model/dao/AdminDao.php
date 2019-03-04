<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2/24/2019
 * Time: 9:27 PM
 */

namespace model\dao;


use model\Halls;
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
            $stmt = $pdo->prepare("DELETE FROM movies WHERE movie_id = ?");
            $stmt->execute(array($movie_id));
            return true;
        }catch (\PDOException $e){
            echo "Error" . $e->getMessage();
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




}
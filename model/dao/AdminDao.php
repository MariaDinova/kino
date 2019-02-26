<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2/24/2019
 * Time: 9:27 PM
 */

namespace model\dao;


use model\Movie;

class AdminDao{
    public static function getAllMovies(){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT m.movie_id, m.movie_name, m.description, t.movie_type, m.image_uri, m.trailer_uri, age.restriction, m.price, m.duration, m.slot
                                        FROM movies AS m
                                        JOIN movie_type AS t
                                        ON m.movie_type_id = t.movie_type_id
                                        JOIN age_restriction AS age
                                        ON m.age_rest_id = age.age_rest_id;");
        $stmt->execute();
        $movies = [];
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)){
                $movie = new Movie($row->movie_id,$row->movie_name,$row->description,$row->movie_type,
                    $row->image_uri,$row->trailer_uri,$row->restriction,$row->price);
                $movies[]=$movie;
            }
            return $movies;
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


   public static function insertCinema($location_id, $cinema_name){
       try {
           $pdo = DBConnection::getSingletonPDO();
           $stmt = $pdo->prepare("INSERT INTO cinema (location_id, cinema_name) VALUES (?, ?)");
           $stmt->execute(array($location_id, $cinema_name));
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



}
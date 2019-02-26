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

    public static function insertMovie($id, $movie_name, $description, $movie_type, $image_uri, $trailer_uri, $restriction, $price, $duration, $slot ){
        $pdo = DBConnection::getSingletonPDO();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("INSERT INTO movies (movie_name, description, 
                                                                image_uri, trailer_uri, 
                                                                price, duration, slot) 
                                            VALUES (?, ?, ?, ?, ?, ?, ?);");
            $stmt->execute(array($movie_name, $description, $image_uri, $trailer_uri, $price, $duration, $slot));

            $pdo->commit();
            return true;
            }catch (\PDOException $e){
            echo "Error" . $e->getMessage();
            $pdo->rollBack();
            return false;
        }
    }
}
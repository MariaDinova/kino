<?php
/**
 * Created by PhpStorm.
 * User: Maria
 * Date: 24.2.2019 г.
 * Time: 18:31 ч.
 */

namespace model\dao;

use model\Movie;
class MovieDao {
    public static function getAll(){

        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT movie_id, movie_name, description, movie_type, image_uri, trailer_uri, restriction, price 
                                          FROM movies LEFT JOIN movie_type ON movies.movie_type_id=movie_type.movie_type_id
                                          LEFT JOIN age_restriction ON movies.age_rest_id=age_restriction.age_rest_id");
        $stmt->execute();
        $movies = [];
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $movie = new Movie($row->movie_id,$row->movie_name,$row->description,$row->movie_type,
                                $row->image_uri,$row->trailer_uri,$row->restriction,$row->price);
            $movies[]=$movie;
        }
        return $movies;
    }

}
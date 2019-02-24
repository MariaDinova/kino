<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2/24/2019
 * Time: 9:27 PM
 */

namespace model\dao;


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

        }
    }
}
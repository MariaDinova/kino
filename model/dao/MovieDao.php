<?php
namespace model\dao;

use model\Movie;
class MovieDao {
    /**
     * @return array - all movies
     */
    public static function getAll(){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT movie_id, movie_name, description, movie_type, image_uri, trailer_uri, restriction, price,duration,slot 
                                          FROM movies LEFT JOIN movie_type ON movies.movie_type_id=movie_type.movie_type_id
                                          LEFT JOIN age_restriction ON movies.age_rest_id=age_restriction.age_rest_id");
        $stmt->execute();
        $movies = [];
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $movie = new Movie($row->movie_id,$row->movie_name,$row->description,$row->movie_type,
                                $row->image_uri,$row->trailer_uri,$row->restriction,$row->price,$row->duration,$row->slot);
            $movies[]=$movie;
        }
        return $movies;
    }

    /**
     * @param int $id
     * @return object Movie
     */
    public static function getOne ($id){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT movie_id, movie_name, description, movie_type, image_uri, trailer_uri, restriction, price,duration,slot  
                                          FROM movies 
                                            LEFT JOIN movie_type ON movies.movie_type_id=movie_type.movie_type_id
                                            LEFT JOIN age_restriction ON movies.age_rest_id=age_restriction.age_rest_id
                                            WHERE movie_id=?");
        $stmt->execute(array($id));
        if($stmt->rowCount() == 0){
            return null;
        }
        else {
           $row = $stmt->fetch(\PDO::FETCH_OBJ);
           $movie =  new Movie($row->movie_id,$row->movie_name,$row->description,$row->movie_type,
               $row->image_uri,$row->trailer_uri,$row->restriction,$row->price,$row->duration,$row->slot);
            return $movie;
        }
    }
}


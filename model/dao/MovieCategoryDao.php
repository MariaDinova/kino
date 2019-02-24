<?php


namespace model\dao;


use model\MovieCategory;

class MovieCategoryDao {
    public static function getAll(){

        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT movie_type_id, movie_type FROM movie_type;");
        $stmt->execute();
        $movieTypes = [];
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $movieType = new MovieCategory($row->movie_type_id,$row->movie_type);
            $movieTypes[]=$movieType;
        }
        return $movieTypes;
    }
}
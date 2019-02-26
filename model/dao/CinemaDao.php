<?php

namespace model\dao;

use model\Cinema;
class CinemaDao {
    public static function getAll(){

        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT cinema_id, cinema_name, cinema_thumb, cinema_img, city FROM cinema LEFT JOIN locations ON cinema.location_id=locations.location_id");
        $stmt->execute();
        $cinemas = [];
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $cinema = new Cinema($row->cinema_id,$row->cinema_name, $row->cinema_thumb, $row->cinema_img,$row->city);
            $cinemas[]=$cinema;
        }
        return $cinemas;
    }

}
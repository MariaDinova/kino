<?php


namespace model\dao;


use model\Halls;

class HallsDao {
    public static function getAll(){

        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT hall_id, cinema_id, type, seats FROM halls
        LEFT JOIN hall_types ON halls.hall_type_id=hall_types.hall_type_id");
        $stmt->execute();
        $halls = [];
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $hall = new Halls($row->hall_id,$row->cinema_id,$row->type,$row->seats);
            $halls[]=$hall;
        }
        return $halls;
    }

    public static function getByCinema($cinema){

        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT hall_id, cinema_id, type, seats FROM halls
        LEFT JOIN hall_types ON halls.hall_type_id=hall_types.hall_type_id
        WHERE halls.cinema_id=?");
        $stmt->execute(array($cinema));
        $halls = [];
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $hall = new Halls($row->hall_id,$row->cinema_id,$row->type,$row->seats);
            $halls[]=$hall;
        }
        return $halls;
    }

}
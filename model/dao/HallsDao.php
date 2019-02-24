<?php


namespace model\dao;


use model\Halls;

class HallsDao {
    public static function getAll(){

        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT hall_id, cinema_name, type, seats FROM halls
                                          LEFT JOIN cinema ON halls.hall_id=cinema.cinema_id
                                          LEFT JOIN hall_types ON halls.hall_type_id=hall_types.hall_type_id");
        $stmt->execute();
        $halls = [];
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $hall = new Halls($row->hall_id,$row->cinema_name,$row->type,$row->seats);
            $halls[]=$hall;
        }
        return $halls;
    }

}
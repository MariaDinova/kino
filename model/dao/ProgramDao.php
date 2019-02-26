<?php
/**
 * Created by PhpStorm.
 * User: Maria
 * Date: 26.2.2019 г.
 * Time: 11:36 ч.
 */

namespace model\dao;
use model\Program;

class ProgramDao {
    public static function getAllByDate($date){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT program_id, cinema_name, type, movie_name, hour_start, start_date, end_date, screening, slot 
                                          FROM programs
                                          LEFT JOIN halls ON programs.hall_id=halls.hall_id
                                          LEFT JOIN hall_types ON halls.hall_type_id=hall_types.hall_type_id
                                          LEFT JOIN cinema ON halls.cinema_id=cinema.cinema_id
                                          LEFT JOIN movies ON programs.movie_id=movies.movie_id
                                          LEFT JOIN periods ON programs.period_id=periods.period_id
                                          WHERE start_date <= ? AND ? <= end_date");
        $stmt->execute(array($date, $date));
        $programs = [];
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $programByDate = [];

            for ($i = 0; $i < $row->screening; $i++){
                $programByDate[] = date('H:m',mktime($row->hour_start, 0+($i*$row->slot), 00, 01, 02, 2001));
            }


            $program = new Program ($row->program_id,$row->cinema_name,$row->type,$row->movie_name,
                $row->hour_start,$row->start_date,$row->end_date,$row->screening,$row->slot, $programByDate);
            $programs[]=$program;
        }
        return $programs;
    }

}

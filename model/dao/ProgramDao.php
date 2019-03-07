<?php
namespace model\dao;

use model\Program;

class ProgramDao {
    /**
     * @param $date
     * @return array - program for chosen day
     */
    public static function getAllByDate($date){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT program_id, cinema_name, type, movie_name, hour_start, start_date, end_date, screening, slot, image_uri, trailer_uri
                                          FROM programs
                                          LEFT JOIN halls ON programs.hall_id=halls.hall_id
                                          LEFT JOIN hall_types ON halls.hall_type_id=hall_types.hall_type_id
                                          LEFT JOIN cinema ON halls.cinema_id=cinema.cinema_id
                                          LEFT JOIN movies ON programs.movie_id=movies.movie_id
                                          LEFT JOIN periods ON programs.period_id=periods.period_id
                                          WHERE start_date <= ? AND ? <= end_date");
        $stmt->execute(array($date, $date));
        if($stmt->rowCount() == 0){
            return null;
        }
        else {
            $programs = [];
            while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
                $programByDate = [];
                list($hour, $minute) = explode(":", $row->hour_start);
                    for ($i = 0; $i < $row->screening; $i++){
                        $programByDate[] = date('H:i',mktime($hour, $minute+($i*($row->slot)), 0, 01, 02, 2001));
                    }
                $program = new Program ($row->program_id,$row->type, $row->movie_name,$row->cinema_name,
                                        $row->hour_start,$row->start_date,$row->end_date,$row->screening,$row->slot, $programByDate, $row->image_uri,$row->trailer_uri);
                $programs[]=$program;
            }
            return $programs;
        }
    }


    /**
     * @param $date
     * @param $hall
     * @return array - program for chosen day in chosen hall
     */
    public static function getAllByDateHall($date, $hall){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT program_id, cinema_name, type, movie_name, hour_start, start_date, end_date, screening, slot, image_uri, trailer_uri
                                          FROM programs
                                          LEFT JOIN halls ON programs.hall_id=halls.hall_id
                                          LEFT JOIN hall_types ON halls.hall_type_id=hall_types.hall_type_id
                                          LEFT JOIN cinema ON halls.cinema_id=cinema.cinema_id
                                          LEFT JOIN movies ON programs.movie_id=movies.movie_id
                                          LEFT JOIN periods ON programs.period_id=periods.period_id
                                          WHERE start_date <= ? AND ? <= end_date AND halls.hall_id = ?");
        $stmt->execute(array($date, $date, $hall));
        if($stmt->rowCount() == 0){
            return null;
        }
        else {
            $programs = [];
            while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
                $programByDate = [];
                list($hour, $minute) = explode(":", $row->hour_start);
                    for ($i = 0; $i < $row->screening; $i++){
                        $programByDate[] = date('H:i',mktime($hour, $minute+($i*($row->slot)), 0, 01, 02, 2001));
                    }
                $program = new Program ($row->program_id,$row->type, $row->movie_name,$row->cinema_name,
                                        $row->hour_start,$row->start_date,$row->end_date,$row->screening,$row->slot, $programByDate, $row->image_uri,$row->trailer_uri);
                $programs[]=$program;
            }
            return $programs;
        }
    }
}



<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/1/2019
 * Time: 2:32 PM
 */

namespace model\dao;


use model\Period;

class PeriodsDao{

    public static function getAllPeriods(){

        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT period_id, start_date, end_date FROM periods");
        $stmt->execute();
        $cinemas = [];
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $period = new Period($row->period_id,$row->start_date, $row->end_date);
            $periods[]=$period;
        }
        return $periods;
    }

}
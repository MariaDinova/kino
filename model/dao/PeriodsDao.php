<?php
namespace model\dao;

use model\Period;

class PeriodsDao{
    /**
     * @return array - all periods
     */
    public static function getAllPeriods(){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT period_id, start_date, end_date FROM periods");
        $stmt->execute();
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $period = new Period($row->period_id,$row->start_date, $row->end_date);
            $periods[]=$period;
        }
        return $periods;
    }
}
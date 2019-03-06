<?php


namespace model\dao;


use model\AgeRestriction;

class AgeRestrictionDao {
    /**
     * @return array
     */
    public static function getAll(){

        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT age_rest_id, restriction FROM age_restriction;");
        $stmt->execute();
        $ageRestrictions = [];
        while ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $ageRest = new AgeRestriction($row->age_rest_id,$row->restriction);
            $ageRestrictions[]=$ageRest;
        }
        return $ageRestrictions;
    }
}
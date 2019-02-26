<?php
/**
 * Created by PhpStorm.
 * User: Maria
 * Date: 26.2.2019 г.
 * Time: 11:35 ч.
 */

namespace controller;


use model\dao\ProgramDao;

class ProgramController {

    public function list(){
        $day = isset($_GET["day"]) ?  $_GET["day"] : date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
        $programByDate = ProgramDao::getAllByDate($day);

        require (URI.'smartyHeader.php');
        $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
        $smarty->assign('BASE_PATH', BASE_PATH);
        $smarty->assign('programs', $programByDate);
        $smarty->assign('weekArr', $this->getWeekArray());
        $smarty->display('programList.tpl');
    }


    private function getWeekArray(){
        $weekArr = [];
        date_default_timezone_set('UTC');
        for ($i = 0; $i < 7; $i++){
            $day=date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y")));
            $weekArr[$day]  = date("d m, l",mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y")));

        }
        return $weekArr;

    }


}
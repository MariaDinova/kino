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

        $msg = "";
        $hall = "all";
        if(isset($_GET["hall"]) && $_GET["hall"] != "all"){
            $hall = $_GET["hall"];

            if(ProgramDao::getAllByDateHall($day, $hall) != null){
                $programByDate = ProgramDao::getAllByDateHall($day, $hall);
            }
            else {
                $msg .= "hall not exists";
                $programByDate = null;
            }

        }
        else {
            if(ProgramDao::getAllByDate($day) != null){
                $programByDate = ProgramDao::getAllByDate($day);
            }
            else {
                $msg .= "day not exists";
                $programByDate = null;
            }

        }

        require (URI.'smartyHeader.php');
        $smarty->assign('msg', $msg);
        $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
        $smarty->assign('BASE_PATH', BASE_PATH);
        $smarty->assign('programs', $programByDate);
        $smarty->assign('hall', $hall);
        $smarty->assign('date', $day);
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
<?php
namespace controller;

use model\dao\ProgramDao;
class ProgramController {
    /**
     * List program by date and hall
     * If user doesn't choose day and hall - list for current date in all halls
     * Call - smartyTemplate - programList.tpl
     *
     * @return void
     */
    public function list(){
        // if is not set day, day = current date
        $day = isset($_GET["day"]) ?  $_GET["day"] : date("Y-m-d");
        $msg = "";
        //if is there no hall - hall=all
        $hall = "all";
        //If is chosen hall we must ge the program only for this hall
        if(isset($_GET["hall"]) && $_GET["hall"] != "all"){
            $hall = $_GET["hall"];
            $programByDate = ProgramDao::getAllByDateHall($day, $hall);
            // if result is null - we do not have hall with this id
            if($programByDate == null){
                $msg .= "Все още няма програма за тази зала в този ден";
            }
        }
        //else we must list program for this date in all halls in all cinema
        else {
            $programByDate = ProgramDao::getAllByDate($day);
            //if result is null - there is no program for this day in bd
            if($programByDate == null){
                $msg .= "Все още няма програма за този ден";
            }
        }
        $GLOBALS["smarty"]->assign('msg', $msg);
        $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
        $GLOBALS["smarty"]->assign('programs', $programByDate);
        $GLOBALS["smarty"]->assign('hall', $hall);
        $GLOBALS["smarty"]->assign('date', $day);
        $GLOBALS["smarty"]->assign('weekArr', $this->getWeekArray());
        $GLOBALS["smarty"]->display('programList.tpl');
    }


    /**
     * @return array - seven days from current day
     */
    private function getWeekArray(){
        $weekArr = [];
        date_default_timezone_set('UTC');
        for ($i = 0; $i < 7; $i++){
            $day=date('Y-m-d',strtotime("+$i day"));
            $weekArr[$day]  = date('d.m.Y',strtotime("+$i day"));
        }
        return $weekArr;
    }
}






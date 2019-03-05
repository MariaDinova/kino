<?php
/**
 * Created by PhpStorm.
 * User: Maria
 * Date: 24.2.2019 г.
 * Time: 17:20 ч.
 */

namespace controller;


use model\dao\HallsDao;
use model\Halls;

class HallsController {
    public function list(){
        $msg = "";
        //$allHalls = [];
        //Check if is set cinema id.
        if(isset($_GET["cinema"])){
            $cinema=$_GET["cinema"];
            //If is set - get all halls for the chosen cinema from HallsDao.
            $allHalls = HallsDao::getByCinema($cinema);
            //If result is NULL, there is not cinema with this id in db
            if($allHalls == NULL){
                $msg .="cinema not exists";
            }
        }
        //If cinema id is not set take all halls from db
        else {
            $allHalls = HallsDao::getAll();
        }

        // Show hallsList.tpl
        $GLOBALS["smarty"]->assign('msg', $msg);
        $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
        $GLOBALS["smarty"]->assign('halls', $allHalls);
        $GLOBALS["smarty"]->display('hallsList.tpl');

    }

}
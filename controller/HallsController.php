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
        $allHalls = [];

        if(isset($_GET["cinema"])){
            $cinema=$_GET["cinema"];
            $allHalls = HallsDao::getByCinema($cinema);
        } else {
            $allHalls = HallsDao::getAll();
        }


        require (URI.'smartyHeader.php');
        $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
        $smarty->assign('BASE_PATH', BASE_PATH);
        $smarty->assign('halls', $allHalls);
        $smarty->display('hallsList.tpl');

    }

}
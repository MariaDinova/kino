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
        if(isset($_GET["cinema"])){
            $cinema=$_GET["cinema"];
        }
        $allHalls = [];
        $allHalls = HallsDao::getAll($cinema);

        require (URI.'smartyHeader.php');

        $smarty->assign('BASE_PATH', BASE_PATH);
        $smarty->assign('halls', $allHalls);
        $smarty->display('hallsList.tpl');

    }

}
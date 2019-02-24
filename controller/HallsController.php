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
        $allHalls = HallsDao::getAll();

        include_once URI."view/hallsList.php";
    }

}
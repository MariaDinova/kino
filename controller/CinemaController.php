<?php

namespace controller;


use model\dao\CinemaDao;

class CinemaController {

    public function list(){
        $allCinema = [];
        $allCinema = CinemaDao::getAll();

        include_once URI."view/cinemaList.php";
    }

}
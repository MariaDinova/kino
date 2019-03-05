<?php

namespace controller;

use model\dao\CinemaDao;

class CinemaController {

    public function list(){
        //$allCinema = [];

        //Get all cinema from CinemaDao and go to cinemaList.tpl
        $allCinema = CinemaDao::getAll();

        $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
        $GLOBALS["smarty"]->assign('cinemas', $allCinema);
        $GLOBALS["smarty"]->display('cinemaList.tpl');

    }
}


<?php

namespace controller;


use model\dao\CinemaDao;

class CinemaController {

    public function list(){
        $allCinema = [];
        $allCinema = CinemaDao::getAll();

        require (URI.'smartyHeader.php');
        $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
        $smarty->assign('BASE_PATH', BASE_PATH);
        $smarty->assign('cinemas', $allCinema);
        $smarty->display('cinemaList.tpl');

    }


}
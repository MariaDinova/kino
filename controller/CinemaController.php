<?php
namespace controller;

use model\dao\CinemaDao;
class CinemaController {
    /**
     * Get all cinema from CinemaDao
     * Call - smartyTemplate - cinemaList.tpl
     *
     * @return void
     */
    public function list(){
        $allCinema = CinemaDao::getAll();
        $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
        $GLOBALS["smarty"]->assign('cinemas', $allCinema);
        $GLOBALS["smarty"]->display('cinemaList.tpl');
    }
}




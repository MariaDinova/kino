<?php
namespace controller;

use model\dao\MovieDao;

class BaseController {

    public function index(){
        $allMovies = [];
        $allMovies = MovieDao::getAll();
        require (URI.'smartyHeader.php');
        $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
        $smarty->assign('BASE_PATH', BASE_PATH);
        $smarty->assign('movies', $allMovies);
        $smarty->display('index-view.tpl');
    }
}



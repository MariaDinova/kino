<?php
namespace controller;

use model\dao\MovieDao;

class BaseController {

    public function index(){
        //Take all movies from MovieDao and show it in index-view.tpl
        $allMovies = MovieDao::getAll();

        $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
        $GLOBALS["smarty"]->assign('movies', $allMovies);
        $GLOBALS["smarty"]->display('index-view.tpl');
    }
}



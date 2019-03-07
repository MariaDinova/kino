<?php
namespace controller;

use model\dao\MovieDao;
class BaseController {
    /**
     * Take all movies from MovieDao
     * Call - smartyTemplate - index-view.tpl
     *
     * @return void
     */
    public function index(){
        $allMovies = MovieDao::getAll();
        $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
        $GLOBALS["smarty"]->assign('movies', $allMovies);
        $GLOBALS["smarty"]->display('index-view.tpl');
    }
}





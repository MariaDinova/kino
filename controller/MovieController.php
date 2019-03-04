<?php


namespace controller;


use model\dao\MovieDao;

class MovieController {
    public function list(){
        $allMovies = [];
        $allMovies = MovieDao::getAll();

        require (URI.'smartyHeader.php');
        $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
        $smarty->assign('BASE_PATH', BASE_PATH);
        $smarty->assign('movies', $allMovies);
        $smarty->display('index-view.tpl');
    }

    public function listIndividual(){
        $movieId = (isset($_GET["id"])) ? $_GET["id"] : "";

            $movie = MovieDao::getOne($movieId);

            if ($movie == null){
                require (URI.'smartyHeader.php');
                $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
                $smarty->assign('BASE_PATH', BASE_PATH);
                $smarty->display('badValues.tpl');
            }
            else {
                require (URI.'smartyHeader.php');
                $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
                $smarty->assign('BASE_PATH', BASE_PATH);
                $smarty->assign('movie', $movie);
                $smarty->display('movieList.tpl');
            }
    }
}

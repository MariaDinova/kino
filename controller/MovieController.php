<?php
/**
 * Created by PhpStorm.
 * User: Maria
 * Date: 24.2.2019 г.
 * Time: 18:31 ч.
 */

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
        $smarty->display('movieList.tpl');

    }

}

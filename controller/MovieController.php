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

        include_once URI."view/movieList.php";
    }

}
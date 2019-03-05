<?php


namespace controller;


use model\dao\MovieCategoryDao;

class MovieCategoryController {
    public function list(){

        $allCategories = MovieCategoryDao::getAll();

        include_once URI."view/movieCategoryList.php";
    }

}

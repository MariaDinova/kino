<?php
namespace controller;

use model\dao\MovieDao;
class MovieController {

    /**
     * Get info for movie with id by get. If not successful - go to error page.
     *
     * Call - smartyTemplate - movieList.tpl
     *
     * @return void
     */
    public function listIndividual(){
        $movieId = (isset($_GET["id"])) ? $_GET["id"] : "";
        $movie = MovieDao::getOne($movieId);
        $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
        if ($movie == null){
            $GLOBALS["smarty"]->display('badValues.tpl');
        }
        else {
            $GLOBALS["smarty"]->assign('movie', $movie);
            $GLOBALS["smarty"]->display('movieList.tpl');
        }
    }
}

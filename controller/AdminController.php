<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2/24/2019
 * Time: 7:23 PM
 */

namespace controller;


use model\dao\AdminDao;
use model\dao\AgeRestrictionDao;
use model\dao\CinemaDao;
use model\dao\MovieCategoryDao;
use model\dao\PeriodsDao;

class AdminController{

    public function logout(){
        if(isset($_POST["logout"])){
            session_unset();
            session_destroy();
            header("Location:".BASE_PATH."index.php");
        }
    }

    public static function getAllMovies(){
        $movies = AdminDao::getAllMovies();
        return $movies;
    }

    public static function getAllTickets(){
        $tickets = AdminDao::getAllTickets();
        return $tickets;
    }

    public static function getAllMovieTypes(){
        $movie_types = MovieCategoryDao::getAll();
        return $movie_types;
    }

    public static function getAllRestrictions(){
        $restrictions = AgeRestrictionDao::getAll();
        return $restrictions;
    }

    public static function getAllHalls(){
    $halls = AdminDao::getAllHalls();
    return $halls;
}

    public static function getAllHallTypes(){
        $hallTypes = AdminDao::getAllHallTypes();
        return $hallTypes;
    }

    public static function getAllCinemas(){
        $cinemas = CinemaDao::getAll();
        return $cinemas;
    }

    public static function getAllPeriods(){
        $periods = PeriodsDao::getAllPeriods();
        return $periods;
    }

    public static function getProgramIdsFromTickets(){
        $program_ids = AdminDao::getProgramIdFromTickets();
        return $program_ids;
    }



    public function insertMovie(){
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST["insertMovie"])) {
                if (!empty($_POST["movie_name"])) {
                    $movie_name = $_POST["movie_name"];
                } else {
                    $error = "Required field";
                }
                if (!empty($_POST["desc"])) {
                    $description = $_POST["desc"];
                } else {
                    $error = "Required field";
                }

                $movie_type = $_POST["movie_type"];
                $tmp_image = $_FILES["image"]["tmp_name"];
                if (is_uploaded_file($tmp_image)) {
                    $fileName = $movie_name . time() . ".jpg";
                    if (move_uploaded_file($tmp_image, "images/$fileName")) {
                        $image = "images/$fileName";
                    } else {
                        $error = "Error with the file, please try again";
                    }
                } else {
                    $error = "Error with the file, please try again";
                }
                if (!empty($_POST["trailer"])) {
                    $trailer = $_POST["trailer"];
                } else {
                    $error = "Required field";
                }

                $age_restriction = $_POST["age_rest"];

                if (!empty($_POST["price"])) {
                    if($_POST["price"] > 0  && $_POST["price"] < 1000) {
                        $price = intval(($_POST["price"]));
                    }else {
                        $error = "Must be a positive number and not over 1000";
                    }
                } else {
                    $error = "Required field and must be a positive number";
                }
                if (!empty($_POST["duration"])) {
                    if($_POST["duration"] > 0 && $_POST["duration"] < 1000) {
                        $duration = intval($_POST["duration"]);
                    }else {
                        $error = "Must be a positive number and not over 1000";
                    }
                } else {
                    $error = "Required field and must be a number";
                }
                if (!empty($_POST["slot"])) {
                    if($_POST["slot"] >= 0 && $_POST["slot"] < 1000 ) {
                        $slot = intval($_POST["slot"]);
                    }else {
                        $error = "Must be a positive number and not over 1000";
                    }
                } else {
                    $error = "Required field and must be a positive number";
                }


                if (strlen($error) == 0) {
                    AdminDao::insertMovie($movie_name, $description, $movie_type, $image, $trailer, $age_restriction, $price, $duration, $slot);
                    include_once URI . "view/adminPanel.php";
                } else {
                    echo "<h3>" . $error . "</h3>";
                    include_once URI . "view/adminPanel.php";

                }
            }
        }else{

            include_once URI . "view/adminPanel.php";
        }

    }


    public function updateMovie(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $error = "";
            if(isset($_POST["updateMovie"])){
                $movie_id = $_POST["movie_id"];
                $movie_name = $_POST["name"];
                $movie_description = $_POST["description"];
                $movie_type = $_POST["movie_type"];
                $movie_trailer = $_POST["trailer"];
                $age_restriction = $_POST["age_rest"];

                if($_POST["price"] > 0) {
                    $price = intval(($_POST["price"]));
                }else {
                    $error = "Must be a positive number";
                }

                if($_POST["duration"] > 0) {
                    $duration = intval($_POST["duration"]);
                }else {
                    $error = "Must be a positive number";
                }

                if($_POST["slot"] >= 0) {
                    $slot = intval($_POST["slot"]);
                }else {
                    $error = "Must be a positive number";
                }

                if (strlen($error) == 0) {
                    AdminDao::updateMovie($movie_id, $movie_name, $movie_description,
                                          $movie_type, $movie_trailer, $age_restriction,
                                          $price, $duration, $slot);
                    include_once URI . "view/adminPanel.php";
                } else {
                    echo "<h3>" . $error . "</h3>";
                    include_once URI . "view/adminPanel.php";

                }
            }
        }
    }


    public function insertRestriction(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST["insertRestriction"])) {
                if (!empty($_POST["restriction"])) {
                    $restriction = $_POST["restriction"];
                    AdminDao::insertRestriction($restriction);
                    include_once URI . "view/adminPanel.php";
                } else {
                    echo "<h3>Required field</h3>";
                    include_once URI . "view/adminPanel.php";
                }
            }
        }else{
            include_once URI . "view/adminPanel.php";
        }
    }


    public function deleteMovie(){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST["deleteMovie"])) {
                $movieIds_with_tickets = AdminDao::getMovieIdFromTickets();
                $movieId = $_POST["movieId"];
                if(in_array($movieId, $movieIds_with_tickets)){
                    echo "<h3>Sorry, the movie is in the program, don't delete it</h3>";
                    include_once URI . "view/adminPanel.php";
                }else {
                    AdminDao::deleteMovie($movieId);
                    include_once URI . "view/adminPanel.php";
                }
            }
        }else{
            include_once URI . "view/adminPanel.php";
        }
    }


    public function insertHallType(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                if(isset($_POST["insertHallType"])){
                    if(!empty($_POST["hall_type"])) {
                        $hallType = $_POST["hall_type"];
                        AdminDao::insertHallType($hallType);
                        include_once URI . "view/adminPanel.php";
                    }
                }
            }else{
                include_once URI . "view/adminPanel.php";
            }
    }


    public static function insertPeriod(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST["insertPeriod"])){
                if(!empty($_POST["start_date"])){
                    $startDate = $_POST["start_date"];
                    if(!empty($_POST["end_date"])){
                        $endDate = $_POST["end_date"];
                        AdminDao::insertPeriod($startDate, $endDate);
                        include_once URI . "view/adminPanel.php";
                    }
                }
            }
        }else{
            include_once URI . "view/adminPanel.php";
        }
    }


    public static function insertProgram(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST["insertProgram"])){
                $hall_id = $_POST["hall_id"];
                $movie_id = $_POST["movie_id"];
                if(!empty($_POST["hourStart"])) {
                    $hourStart = $_POST["hourStart"];
                }else{
                    echo "Reqired field";
                }
                $period_id = $_POST["period_id"];
                if(isset($_POST["screening"]) && $_POST["screening"] > 0) {
                    $screening = $_POST["screening"];
                }else{
                    $screening = null;
                }

                AdminDao::insertProgram($hall_id, $movie_id, $hourStart, $period_id, $screening);
                include_once URI . "view/adminPanel.php";
            }
        }else{
            include_once URI . "view/adminPanel.php";
        }
    }


    public function cancelReservation(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (isset($_POST["cancelReservation"])) {
                $userId = $_POST["user_id"];
                AdminDao::cancelReservation($userId);
                include_once URI . "view/adminPanel.php";
            }
        }else{
            include_once URI . "view/adminPanel.php";
        }
    }





}
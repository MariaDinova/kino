<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2/24/2019
 * Time: 7:23 PM
 */

namespace controller;


use model\dao\AdminDao;

class AdminController{

    public function insertMovie(){
        $error = null;
        if(isset($_POST["insertMovie"])){
            $movie_name = $_POST["movie_name"];
            $description = $_POST["desc"];
            $movie_type= $_POST["movie_type"];
            $tmp_image = $_FILES["image"]["tmp_name"];
            if(is_uploaded_file($tmp_image)){
                $fileName = time() .".jpg";
                if(move_uploaded_file($tmp_image, "images/$fileName")){
                    $image = "images/$fileName";
                }else{
                    $error = "Error with the file, please try again";
                }
            }else{
                $error = "Error with the file, please try again";
            }
            $trailer = $_POST["trailer"];
            $age_restriction = $_POST["age_rest"];
            $price = $_POST["price"];
            $duration = $_POST["duration"];
            $slot = $_POST["slot"];

            if(strlen($error) == 0){
                AdminDao::insertMovie($movie_name, $description, $movie_type, $image, $trailer, $age_restriction, $price, $duration, $slot);
            }
        }

    }



}
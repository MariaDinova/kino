<?php

namespace controller;

use model\dao\UserDao;
use model\User;

class UserController {

    public function register (){
        if (isset($_POST["register"])) {

            //TODO validate inputs from post

            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $password = password_hash(trim($_POST["password"]), PASSWORD_BCRYPT);
            $age = $_POST["age"];

            $user = UserDao::getByEmail($email);

            if($user != null){
                header("HTTP/1.1 400 User already exists");

                //TODO header location to registerError.html where is register with red fields
            }
            else {
                $newUser = new User(null, $firstName,$lastName,$email,$password,$age);
                UserDao::addUser($newUser);
                $_SESSION["user"] = $newUser;
                include_once URI."view/index-view.php";

            }

        }
        else {
            include_once URI."view/register.php";
        }


    }

    public function logout(){
        session_unset();
        session_destroy();

        header("Location:".BASE_PATH."index.php");
    }

    public function login(){

    }
}
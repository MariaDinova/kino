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
            $isAdmin = null;

            $user = UserDao::getByEmail($email);

            if($user != null){
                header("HTTP/1.1 400 User already exists");

                //TODO header location to registerError.html where is register with red fields
            }
            else {
                $newUser = new User(null, $firstName,$lastName,$email,$password,$age,$isAdmin);
                UserDao::addUser($newUser);
                $_SESSION["user"] = $newUser;

                require (URI.'smartyHeader.php');

                $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
                $smarty->assign('BASE_PATH', BASE_PATH);
                $smarty->display('index-view.tpl');
            }
        }
        else {

            require (URI.'smartyHeader.php');
            $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
            $smarty->assign('BASE_PATH', BASE_PATH);
            $smarty->display('register.tpl');
        }

    }


    public function logout(){
        session_unset();
        session_destroy();

        header("Location:".BASE_PATH."index.php");
    }


    public function login(){
        if(isset($_POST["login"])){
            $email = $_POST["email"];
            $password = $_POST["password"];
            $realPassword = UserDao::getPassByEmail($email);
            if($realPassword == null){
                //TODO header location to loginError.html
                echo "Invalid password";
            } else{
                if(password_verify($password, $realPassword)) {
                    $user = UserDao::getByEmail($email);
                    $_SESSION["user"]= $user;
                    if($user->getIsAdmin() != null){
                        $_SESSION["user"]= $user;
                        //header("Location: view/adminPanel.php");
                        include_once URI . "view/adminPanel.php";
                    }else {
                        require (URI.'smartyHeader.php');
                        $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
                        $smarty->assign('BASE_PATH', BASE_PATH);
                        $smarty->display('index-view.tpl');
                    }

                }
            }
        } else {
            require (URI.'smartyHeader.php');
            $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
            $smarty->assign('BASE_PATH', BASE_PATH);
            $smarty->display('login.tpl');
        }
    }
}
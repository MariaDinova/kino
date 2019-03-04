<?php

namespace controller;

use model\dao\UserDao;
use model\User;

class UserController {

    public function register (){
        $msg="";
        if (isset($_POST["register"])) {

            if ($this->isValidInput($_POST)){
                $firstName = $_POST["firstName"];
                $lastName = $_POST["lastName"];
                $email = $_POST["email"];
                $password = password_hash(trim($_POST["password"]), PASSWORD_BCRYPT);
                $age = $_POST["age"];
                $isAdmin = null;

                $user = UserDao::getByEmail($email);

                if($user != null){

                    $msg .= "User already exists";
                    require (URI.'smartyHeader.php');
                    $smarty->assign('msg', $msg);
                    $smarty->assign('BASE_PATH', BASE_PATH);
                    $smarty->display('register.tpl');

                }
                else {
                    $newUser = new User(null, $firstName,$lastName,$email,$password,$age,$isAdmin);
                    UserDao::addUser($newUser);
                    $_SESSION["user"] = $newUser;

                    header("Location: ".BASE_PATH);
                }
            }
            else {
                $msg .= "Input is not correct";
                require (URI.'smartyHeader.php');
                $smarty->assign('msg', $msg);
                $smarty->assign('BASE_PATH', BASE_PATH);
                $smarty->display('register.tpl');
            }


        }
        else {
            require (URI.'smartyHeader.php');
            $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
            $smarty->assign('BASE_PATH', BASE_PATH);
            $smarty->assign('msg', $msg);
            $smarty->display('register.tpl');
        }

    }


    public function logout(){
        session_unset();
        session_destroy();

        header("Location:".BASE_PATH."index.php");
    }


    public function login(){

        if (!isset($_GET['response']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST["email"];
            $password = trim($_POST["password"]);
        }
        else if (isset($_GET['response'])) {
            $json_str = file_get_contents('php://input');
            $requestBody = json_decode($json_str, true);

            $email = $requestBody["email"];
            $password = trim($requestBody["password"]);
        }


        $msg = "";
        //post request
        if(isset($email)){

            $realPassword = UserDao::getPassByEmail($email);

            if($realPassword == null){
                $msg .= "Invalid email";
                require (URI.'smartyHeader.php');
                $smarty->assign('msg', $msg);
                $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
                $smarty->assign('BASE_PATH', BASE_PATH);
                $smarty->display('login.tpl');
            }
            else{
                if(password_verify($password, $realPassword)) {
                    $user = UserDao::getByEmail($email);
                    $_SESSION["user"]= $user;

                    if (isset($_GET['response']) && $_GET['response']=="json") {
                        $response = array();
                        $response["success"]= "true";
                        echo  json_encode($response);
                        die();
                    }

                    if($user->getIsAdmin() != null){
                        $_SESSION["user"]= $user;
                        include_once URI . "view/adminPanel.php";
                    }
                    else {
                        header("Location: ".BASE_PATH);
                    }
                }
                else {
                    if (isset($_GET['response']) && $_GET['response']=="json") {
                        $response = array();
                        $response["success"]= "false";
                        echo  json_encode($response);
                        die();
                    }

                    $msg .= "Invalid password";
                    require (URI.'smartyHeader.php');
                    $smarty->assign('msg', $msg);
                    $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
                    $smarty->assign('BASE_PATH', BASE_PATH);
                    $smarty->display('login.tpl');
                }
            }
        }
        else {
            require (URI.'smartyHeader.php');
            $smarty->assign('msg', $msg);
            $smarty->assign('isLoggedIn', isset($_SESSION["user"]));
            $smarty->assign('BASE_PATH', BASE_PATH);
            $smarty->display('login.tpl');
        }
    }




    private function isValidString ($string){
        $isValid = false;

        if(isset($string) && trim($string) != ""){
            $isValid = true;
        }
        return $isValid;
    }

    private function isValidEmail ($email){
        $isValid = false;

        if (isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isValid=true;
        }
        return $isValid;
    }

    private function isValidAge ($age){
        $isValid = false;
        if(isset($age) && $age == intval($age) && $age > 0){
            $isValid = true;
        }
        return $isValid;
    }

    private function isValidInput ($input){

        foreach ($input as $key => $value) {
            $$key = $value;
        }

        $isValid = false;
        if ($this->isValidString($firstName) && $this->isValidString($lastName) && $this->isValidString($password)
                    && $this->isValidEmail($email) && $this->isValidAge($age)){
            $isValid = true;
        }
        return $isValid;
    }
}
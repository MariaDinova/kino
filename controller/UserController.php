<?php
namespace controller;

use model\dao\UserDao;
use model\User;
class UserController {
    /**
     * If is set POST - register user, else call register.tpl
     *
     * @return void
     */
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
                //if user is not empty - the email from input is already exists
                $user = UserDao::getByEmail($email);
                if($user != null){
                    $msg .= "Вече съществува потребител с този email";
                    $this->triggerError($msg, 'register.tpl');
                }
                else {
                    $newUser = new User(null, $firstName,$lastName,$email,$password,$age,$isAdmin);
                    UserDao::addUser($newUser);
                    $_SESSION["user"] = $newUser;
                    header("Location: ".BASE_PATH);
                }
            }
            else {
                $msg .= "Въведени са невалидни данни";
                $this->triggerError($msg, 'register.tpl');
            }
        }
        else {
            $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
            $GLOBALS["smarty"]->assign('msg', $msg);
            $GLOBALS["smarty"]->display('register.tpl');
        }
    }

    /**
     * Logout User
     *
     * @return void
     */
    public function logout(){
        session_unset();
        session_destroy();
        header("Location:".BASE_PATH."index.php");
    }

    /**
     * Data can come in POST or in body
     *
     * @return void
     */
    public function login(){
        if (!isset($_GET['response']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST["email"];
            $password = trim($_POST["password"]);
        }
        //if data come from loginFrom, it is in requests body
        else if (isset($_GET['response'])) {
            $json_str = file_get_contents('php://input');
            $requestBody = json_decode($json_str, true);
            $email = $requestBody["email"];
            $password = trim($requestBody["password"]);
        }
        $msg = "";
        if(isset($email)){
            $realPassword = UserDao::getPassByEmail($email);
            if($realPassword == null){
                $msg .= "Невалиден email";
                $this->triggerError($msg, 'login.tpl');
            }
            else{
                if(password_verify($password, $realPassword)) {
                    $user = UserDao::getByEmail($email);
                    $_SESSION["user"]= $user;
                    //if request is come from loginForm we must return that login is success
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
                    $msg .= "Грешен email или парола";
                    $this->triggerError($msg, 'login.tpl');
                }
            }
        }
        else {
            $GLOBALS["smarty"]->assign('msg', $msg);
            $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
            $GLOBALS["smarty"]->display('login.tpl');
        }
    }

    /**
     * Display Error Page
     *
     * @param string $msg - Error Message
     * @param string $tpl - SmartyTemplate
     * @return void
     */
    public function triggerError($msg, $tpl){

        $GLOBALS["smarty"]->assign('msg', $msg);
        $GLOBALS["smarty"]->assign('isLoggedIn', isset($_SESSION["user"]));
        $GLOBALS["smarty"]->display($tpl);
    }

    /**
     * Validate if string is set
     * @param string $string
     * @return bool
     */
    private function isValidString ($string){
        $isValid = false;
        if(isset($string) && trim($string) != ""){
            $isValid = true;
        }
        return $isValid;
    }

    /**
     * Validate if email is correct
     * @param string $email
     * @return bool
     */
    private function isValidEmail ($email){
        $isValid = false;
        if (isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isValid=true;
        }
        return $isValid;
    }

    /**
     * Validate if age is correct
     * @param int $age
     * @return bool
     */
    private function isValidAge ($age){
        $isValid = false;
        if(isset($age) && $age == intval($age) && $age > 0){
            $isValid = true;
        }
        return $isValid;
    }

    /**
     * Valid password has at least 6 symbols
     *
     * @param string $password
     * @return bool
     */
    private function isValidPassword($password){
        $isValid = false;
        if(isset($password) && trim($password) != "" && strlen($password) >= 6){
            $isValid = true;
        }
        return $isValid;
    }

    /**
     * Validate if all input is correct
     * @param POST array
     * @return bool
     */
    private function isValidInput ($input){
        foreach ($input as $key => $value) {
            $$key = $value;
        }
        $isValid = false;
        if ($this->isValidString($firstName) && $this->isValidString($lastName) && $this->isValidPassword($password)
                    && $this->isValidEmail($email) && $this->isValidAge($age)){
            $isValid = true;
        }
        return $isValid;
    }
}
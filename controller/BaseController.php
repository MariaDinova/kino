<?php
namespace controller;

class BaseController {

    public function index(){

    }
}

require (URI.'smartyHeader.php');
$smarty->assign('isLoggedIn', isset($_SESSION["user"]));
$smarty->assign('BASE_PATH', BASE_PATH);
$smarty->display('index-view.tpl');

<?php
include_once "config.php";

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php' ;
    if ($class !== 'Smarty_Autoloader.php') require_once __DIR__ . DIRECTORY_SEPARATOR . $class;
});


if(!isset($_SESSION)){
    session_start();
}

$fileNotFound = false;


$controllerName = isset($_GET['target']) ? $_GET['target'] : 'base';
$methodName = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerClassName = '\\controller\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClassName))
{
    $controller = new $controllerClassName();
    if (method_exists($controller, $methodName)) {

        try{
            $controller->$methodName();
        }
        catch(\Exception $e){
            header("HTTP/1.1 500"); echo $e->getMessage();
            die();
        }
    } else {
        $fileNotFound = true;
    }
} else {
    $fileNotFound = true;
}


if ($fileNotFound) {
    echo 'target or action invalid: target = ' . $controllerName . ' and action = ' .$methodName;
}
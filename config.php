<?php
//Configure Paths
define("URI", __DIR__."/");
define ("UPLOADED", '/images/');
define ("BASE", 'localhost');
define ("BASE_PATH", 'http://localhost:1234/kino/');

//Configure DB
define("DB_HOST", '127.0.0.1');
define("DB_NAME", 'kino');
define("DB_USER", 'root');
define("DB_PASS", '');

//Configure Smarty
require_once(URI.'libs/smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->caching = false;
$smarty->cache_lifetime = 30;
$smarty->template_dir = './view';
$smarty->compile_dir = './libs/templates_c';
$smarty->assign('BASE_PATH', BASE_PATH);

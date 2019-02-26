<?php
require_once(URI.'smarty/libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->caching = false;
$smarty->cache_lifetime = 30;
$smarty->template_dir = './view';
$smarty->compile_dir = './templates_c';

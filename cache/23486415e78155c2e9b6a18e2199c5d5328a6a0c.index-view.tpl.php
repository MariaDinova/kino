<?php
/* Smarty version 3.1.33, created on 2019-02-26 13:12:14
  from 'C:\xampp\htdocs\kino\view\index-view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c752d1e17c950_50484818',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34ec09b3e453595f63050dede73f15cdf890adf3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kino\\view\\index-view.tpl',
      1 => 1551173337,
      2 => 'file',
    ),
    '37d62da30763bf97e7bca3b822252e1902644a87' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kino\\view\\helpers\\headerLinks.tpl',
      1 => 1551176908,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 30,
),true)) {
function content_5c752d1e17c950_50484818 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>

    <a href="http://localhost:1234/kino/?target=user&action=logout">Logout</a><br>

<a href="http://localhost:1234/kino/?target=cinema&action=list">List all cinema</a> <br>
<a href="http://localhost:1234/kino/?target=movieCategory&action=list">List all movie categories</a> <br>
<a href="http://localhost:1234/kino/?target=ageRestriction&action=list">List all restrictions</a> <br>
<a href="http://localhost:1234/kino/?target=halls&action=list">List all halls</a> <br>
<a href="http://localhost:1234/kino/?target=movie&action=list">List all movies</a> <br>
<a href="http://localhost:1234/kino/?target=program&action=list">Program</a> <br>
</body>
</html>
<?php }
}

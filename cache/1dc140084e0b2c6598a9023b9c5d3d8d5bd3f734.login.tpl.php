<?php
/* Smarty version 3.1.33, created on 2019-02-26 11:17:31
  from 'C:\xampp\htdocs\kino\view\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c75123bed8dd7_19234748',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '669a1fd10a1f1b232f2b58b7173765b06e31a2a8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kino\\view\\login.tpl',
      1 => 1551040476,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 30,
),true)) {
function content_5c75123bed8dd7_19234748 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Please Login</title>
</head>
<body>
<form action="http://localhost:1234/kino/?target=user&action=login" method="post">
    <table>
        <tr>
            <td>Email</td>
            <td>
                <input type="email" name="email" placeholder="your email">
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password" placeholder="your password">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="login" value="Log in">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<?php }
}

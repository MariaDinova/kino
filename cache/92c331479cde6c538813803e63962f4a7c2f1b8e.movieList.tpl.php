<?php
/* Smarty version 3.1.33, created on 2019-02-26 09:40:20
  from 'C:\xampp\htdocs\kino\view\movieList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c74fb7421f7d4_90790516',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '82ebdf49d10e3d105ffe78b24650a0f6c337f507' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kino\\view\\movieList.tpl',
      1 => 1551041041,
      2 => 'file',
    ),
    '37d62da30763bf97e7bca3b822252e1902644a87' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kino\\view\\helpers\\headerLinks.tpl',
      1 => 1551115148,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 30,
),true)) {
function content_5c74fb7421f7d4_90790516 (Smarty_Internal_Template $_smarty_tpl) {
?><a href="http://localhost:1234/kino/?target=cinema&action=list">List all cinema</a> <br>
<a href="http://localhost:1234/kino/?target=movieCategory&action=list">List all movie categories</a> <br>
<a href="http://localhost:1234/kino/?target=ageRestriction&action=list">List all restrictions</a> <br>
<a href="http://localhost:1234/kino/?target=halls&action=list">List all halls</a> <br>
<a href="http://localhost:1234/kino/?target=movie&action=list">List all movies</a> <br>
<p>Movie List</p>

<table>
            <tr>
            <td>Harry Potter</td>
            <td>10</td>
        </tr>
            <tr>
            <td>Garfield</td>
            <td>20</td>
        </tr>
            <tr>
            <td>Silent Hill</td>
            <td>10</td>
        </tr>
    </table>
<?php }
}

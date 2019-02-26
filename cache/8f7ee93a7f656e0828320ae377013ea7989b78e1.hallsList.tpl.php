<?php
/* Smarty version 3.1.33, created on 2019-02-26 10:37:52
  from 'C:\xampp\htdocs\kino\view\hallsList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c7508f001f205_36439255',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e019c6d2214295a7b017a1caad9b389ab82eb3b2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kino\\view\\hallsList.tpl',
      1 => 1551170613,
      2 => 'file',
    ),
    '37d62da30763bf97e7bca3b822252e1902644a87' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kino\\view\\helpers\\headerLinks.tpl',
      1 => 1551173406,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 30,
),true)) {
function content_5c7508f001f205_36439255 (Smarty_Internal_Template $_smarty_tpl) {
?><a href="http://localhost:1234/kino/?target=cinema&action=list">List all cinema</a> <br>
<a href="http://localhost:1234/kino/?target=movieCategory&action=list">List all movie categories</a> <br>
<a href="http://localhost:1234/kino/?target=ageRestriction&action=list">List all restrictions</a> <br>
<a href="http://localhost:1234/kino/?target=halls&action=list">List all halls</a> <br>
<a href="http://localhost:1234/kino/?target=movie&action=list">List all movies</a> <br>
<p>Choose hall</p>

<table>
            <tr>
            <td> vip 20</td>
        </tr>
            <tr>
            <td> children 10</td>
        </tr>
    </table><?php }
}

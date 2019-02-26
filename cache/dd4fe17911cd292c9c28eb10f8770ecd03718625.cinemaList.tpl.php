<?php
/* Smarty version 3.1.33, created on 2019-02-26 09:43:46
  from 'C:\xampp\htdocs\kino\view\cinemaList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c74fc425212e0_94810467',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa5d15229b2e3a010a1e285a017c3768a2e5b039' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kino\\view\\cinemaList.tpl',
      1 => 1551170071,
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
function content_5c74fc425212e0_94810467 (Smarty_Internal_Template $_smarty_tpl) {
?><a href="http://localhost:1234/kino/?target=cinema&action=list">List all cinema</a> <br>
<a href="http://localhost:1234/kino/?target=movieCategory&action=list">List all movie categories</a> <br>
<a href="http://localhost:1234/kino/?target=ageRestriction&action=list">List all restrictions</a> <br>
<a href="http://localhost:1234/kino/?target=halls&action=list">List all halls</a> <br>
<a href="http://localhost:1234/kino/?target=movie&action=list">List all movies</a> <br>
<p>Choose cinema</p>

<table>
            <tr>
            <td><a href="http://localhost:1234/kino/?target=halls&action=list&cinema=1">1 Kino1 Sofia</a> </td>
        </tr>
            <tr>
            <td><a href="http://localhost:1234/kino/?target=halls&action=list&cinema=2">2 Kino2 Varna</a> </td>
        </tr>
            <tr>
            <td><a href="http://localhost:1234/kino/?target=halls&action=list&cinema=3">3 Kino3 Burgas</a> </td>
        </tr>
    </table>

<?php }
}

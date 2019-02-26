<?php
/* Smarty version 3.1.33, created on 2019-02-24 21:42:34
  from 'C:\xampp\htdocs\kino\view\headerLinks.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c7301ba194e07_52800928',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00f352838811c3e51104643ea984efbdc26cc4e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kino\\view\\headerLinks.tpl',
      1 => 1551040876,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c7301ba194e07_52800928 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '14153366445c7301ba189284_83287251';
?>
<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
?target=cinema&action=list">List all cinema</a> <br>
<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
?target=movieCategory&action=list">List all movie categories</a> <br>
<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
?target=ageRestriction&action=list">List all restrictions</a> <br>
<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
?target=halls&action=list">List all halls</a> <br>
<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
?target=movie&action=list">List all movies</a> <br><?php }
}

<?php
/* Smarty version 3.1.33, created on 2019-02-25 18:19:09
  from 'C:\xampp\htdocs\kino\view\helpers\headerLinks.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c74238d970e81_07383312',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37d62da30763bf97e7bca3b822252e1902644a87' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kino\\view\\helpers\\headerLinks.tpl',
      1 => 1551115148,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c74238d970e81_07383312 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1807814355c74238d932676_14032449';
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

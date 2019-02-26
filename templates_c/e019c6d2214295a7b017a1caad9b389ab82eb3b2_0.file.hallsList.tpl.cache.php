<?php
/* Smarty version 3.1.33, created on 2019-02-26 09:43:34
  from 'C:\xampp\htdocs\kino\view\hallsList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c74fc362df4f3_42332422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e019c6d2214295a7b017a1caad9b389ab82eb3b2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kino\\view\\hallsList.tpl',
      1 => 1551170613,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:helpers/headerLinks.tpl' => 1,
  ),
),false)) {
function content_5c74fc362df4f3_42332422 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '14364712215c74fc362895d1_20344877';
$_smarty_tpl->_subTemplateRender("file:helpers/headerLinks.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<p>Choose hall</p>

<table>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['halls']->value, 'hall', false, 'arrayIndex');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['arrayIndex']->value => $_smarty_tpl->tpl_vars['hall']->value) {
?>
        <tr>
            <td> <?php echo $_smarty_tpl->tpl_vars['hall']->value->getHallType();?>
 <?php echo $_smarty_tpl->tpl_vars['hall']->value->getSeats();?>
</td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table><?php }
}

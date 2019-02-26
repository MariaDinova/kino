<?php
/* Smarty version 3.1.33, created on 2019-02-24 21:44:04
  from 'C:\xampp\htdocs\kino\view\movieList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c7302149ffca5_33658589',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '82ebdf49d10e3d105ffe78b24650a0f6c337f507' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kino\\view\\movieList.tpl',
      1 => 1551041041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:helpers/headerLinks.tpl' => 1,
  ),
),false)) {
function content_5c7302149ffca5_33658589 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1414775865c7302149a2086_39715713';
$_smarty_tpl->_subTemplateRender("file:helpers/headerLinks.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<p>Movie List</p>

<table>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['movies']->value, 'movie', false, 'arrayIndex');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['arrayIndex']->value => $_smarty_tpl->tpl_vars['movie']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['movie']->value->getName();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['movie']->value->getPrice();?>
</td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>
<?php }
}

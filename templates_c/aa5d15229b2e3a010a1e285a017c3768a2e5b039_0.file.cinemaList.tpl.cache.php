<?php
/* Smarty version 3.1.33, created on 2019-02-26 09:34:32
  from 'C:\xampp\htdocs\kino\view\cinemaList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c74fa18156103_98012837',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa5d15229b2e3a010a1e285a017c3768a2e5b039' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kino\\view\\cinemaList.tpl',
      1 => 1551170071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:helpers/headerLinks.tpl' => 1,
  ),
),false)) {
function content_5c74fa18156103_98012837 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '17775365915c74fa180f84e7_33985276';
$_smarty_tpl->_subTemplateRender("file:helpers/headerLinks.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<p>Choose cinema</p>

<table>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cinemas']->value, 'cinema', false, 'arrayIndex');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['arrayIndex']->value => $_smarty_tpl->tpl_vars['cinema']->value) {
?>
        <tr>
            <td><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
?target=halls&action=list&cinema=<?php echo $_smarty_tpl->tpl_vars['cinema']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['cinema']->value->getId();?>
 <?php echo $_smarty_tpl->tpl_vars['cinema']->value->getName();?>
 <?php echo $_smarty_tpl->tpl_vars['cinema']->value->getLocation();?>
</a> </td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>

<?php }
}

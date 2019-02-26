<?php
/* Smarty version 3.1.33, created on 2019-02-25 18:18:03
  from 'C:\xampp\htdocs\kino\view\index-view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c74234bc85b86_49561429',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34ec09b3e453595f63050dede73f15cdf890adf3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\kino\\view\\index-view.tpl',
      1 => 1551115082,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:helpers/headerLinks.tpl' => 1,
  ),
),false)) {
function content_5c74234bc85b86_49561429 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '16848109365c74234bc3f672_25536624';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>

<?php if ($_smarty_tpl->tpl_vars['isLoggedIn']->value) {?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
?target=user&action=logout">Logout</a><br>
<?php } else { ?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
?target=user&action=register">Register now</a> <br>
    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
?
    target=user&action=login">Log in</a><br>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:helpers/headerLinks.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html>
<?php }
}

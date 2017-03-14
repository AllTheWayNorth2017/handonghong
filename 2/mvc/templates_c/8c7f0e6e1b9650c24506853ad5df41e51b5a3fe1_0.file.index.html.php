<?php
/* Smarty version 3.1.31, created on 2017-03-12 05:55:39
  from "H:\wamp\www\mvc\app\Home\view\Login\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58c4d4cb7ae8b6_19342255',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c7f0e6e1b9650c24506853ad5df41e51b5a3fe1' => 
    array (
      0 => 'H:\\wamp\\www\\mvc\\app\\Home\\view\\Login\\index.html',
      1 => 1489250534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c4d4cb7ae8b6_19342255 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- Latest compiled and minified CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['getContextPath']->value;?>
/resource/css/bootstrap.css" rel="stylesheet" />

    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['getContextPath']->value;?>
/resource/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
</head>
<body>
<div class="s_center container col-lg-6 ">

    <form class="form-signin" enctype="multipart/form-data"  method="post">
        <h2 class="form-signin-heading">请登录</h2>
        <label class="sr-only">用户名</label>
        <input type="text"  class="form-control" name="username" placeholder="请填写用户名" required autofocus>
        <br />
        <label  class="sr-only">密码</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="密码" required>
        <br />
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="login.check()">登录</button>
    </form>

</div> <!-- /container -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['getContextPath']->value;?>
/resource/js/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['getContextPath']->value;?>
/resource/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['getContextPath']->value;?>
/resource/js/dialog/layer.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['getContextPath']->value;?>
/resource/js/dialog.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['getContextPath']->value;?>
/resource/js/home/login.js"><?php echo '</script'; ?>
>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
</html><?php }
}

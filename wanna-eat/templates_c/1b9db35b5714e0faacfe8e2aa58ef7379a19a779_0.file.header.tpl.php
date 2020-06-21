<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-21 03:44:41
  from 'D:\xampp\htdocs\wanna-eat\wanna-eat\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eeebb896fdb84_91160388',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b9db35b5714e0faacfe8e2aa58ef7379a19a779' => 
    array (
      0 => 'D:\\xampp\\htdocs\\wanna-eat\\wanna-eat\\templates\\header.tpl',
      1 => 1592703881,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eeebb896fdb84_91160388 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
    <div class="container">
        <a href="index.php">
            <h1 class="text-center mb-3">今天要吃啥？</h1></a>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <a href="login.php" class="btn btn-outline-primary btn-sm mr-2">登入</a>
                <a href="index.php" class="btn btn-outline-success btn-sm mr-2">首頁</a>
                <a href="add.php" class="btn btn-outline-info btn-sm mr-2">新增店家</a>
                <a href="logout.php" class="btn btn-outline-secondary btn-sm text-dark">登出</a>
            </div>
        </div>
    </div>
</header>
<?php }
}

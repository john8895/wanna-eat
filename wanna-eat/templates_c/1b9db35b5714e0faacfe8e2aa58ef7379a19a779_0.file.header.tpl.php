<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-21 12:14:11
  from 'D:\xampp\htdocs\wanna-eat\wanna-eat\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eef32f3865f20_87260991',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b9db35b5714e0faacfe8e2aa58ef7379a19a779' => 
    array (
      0 => 'D:\\xampp\\htdocs\\wanna-eat\\wanna-eat\\templates\\header.tpl',
      1 => 1592734451,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eef32f3865f20_87260991 (Smarty_Internal_Template $_smarty_tpl) {
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
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="" class="btn btn-info mr-2" id="wanna_eat">今天要吃啥？</a>
            </div>
        </div>
    </div>
</header>
<?php }
}

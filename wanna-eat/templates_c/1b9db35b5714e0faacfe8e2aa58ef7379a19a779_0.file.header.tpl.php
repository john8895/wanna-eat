<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-02 02:34:18
  from 'D:\xampp\htdocs\wanna-eat\wanna-eat\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efd2b8a491c55_81217223',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b9db35b5714e0faacfe8e2aa58ef7379a19a779' => 
    array (
      0 => 'D:\\xampp\\htdocs\\wanna-eat\\wanna-eat\\templates\\header.tpl',
      1 => 1592958049,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efd2b8a491c55_81217223 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
    <div class="container mb-4">
        <a href="index.php">
            <h1 class="text-center mb-3">今天要吃啥？</h1></a>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <?php if (isset($_smarty_tpl->tpl_vars['logged']->value) && !$_smarty_tpl->tpl_vars['logged']->value) {?>
                    <a href="login.php" class="btn btn-outline-primary btn-sm mr-2">登入</a>
                <?php } else { ?>
                    <a href="logout.php" class="btn btn-outline-secondary btn-sm text-dark mr-2">登出</a>
                    <a href="add.php" class="btn btn-outline-info btn-sm mr-2">新增店家</a>
                <?php }?>
                <a href="index.php" class="btn btn-outline-success btn-sm mr-2">首頁</a>
            </div>
        </div>

    </div>
</header>
<?php }
}

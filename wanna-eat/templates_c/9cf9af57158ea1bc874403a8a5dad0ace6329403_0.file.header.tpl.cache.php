<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-19 16:53:45
  from 'D:\xampp\htdocs\myphp\projects\wanna-eat\wanna-eat\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eecd179049575_09069331',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9cf9af57158ea1bc874403a8a5dad0ace6329403' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myphp\\projects\\wanna-eat\\wanna-eat\\templates\\header.tpl',
      1 => 1592578424,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eecd179049575_09069331 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '6610005745eecd179048911_40609850';
?>

<header>
    <div class="container">
        <h1 class="text-center mb-3">今天要吃啥？</h1>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <a href="login.php" class="btn btn-outline-primary btn-sm mr-2">登入</a>
                <a href="add.php" class="btn btn-outline-info btn-sm mr-2">新增店家</a>
                <a href="logout.php" class="btn btn-outline-secondary btn-sm text-dark">登出</a>
            </div>
        </div>
    </div>
</header>
<?php }
}

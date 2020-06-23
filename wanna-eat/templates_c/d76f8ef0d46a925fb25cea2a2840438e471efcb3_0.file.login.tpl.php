<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-23 15:15:55
  from 'D:\xampp\htdocs\wanna-eat\wanna-eat\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef2008b58f231_11353945',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd76f8ef0d46a925fb25cea2a2840438e471efcb3' => 
    array (
      0 => 'D:\\xampp\\htdocs\\wanna-eat\\wanna-eat\\templates\\login.tpl',
      1 => 1592918154,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:header.tpl' => 1,
    'file:js.tpl' => 1,
  ),
),false)) {
function content_5ef2008b58f231_11353945 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<main>
    <div class="container">
        <div class="row ">
            <div class="m-auto w-50">
                <form class="form-signin" autocomplete="off" action="login.php" method="post">
                    <h1 class="h3 mb-3 font-weight-normal">登入管理</h1>
                    <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
                        <div class="form-group text-danger">
                            <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

                        </div>
                    <?php }?>
                    <div class="form-group">
                        <input type="text" id="inputAccount" class="form-control" placeholder="account" required autofocus
                               name="username" <?php if (isset($_smarty_tpl->tpl_vars['username']->value)) {?>value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
"<?php }?>>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required
                               name="password">
                    </div>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> 在這台電腦上記得我
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">登入</button>
                    <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
                </form>
            </div>
        </div>
    </div>
</main>
<?php $_smarty_tpl->_subTemplateRender("file:js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

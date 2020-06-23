<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-24 00:13:15
  from 'D:\xampp\htdocs\wanna-eat\wanna-eat\templates\order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef27e7ba21ae6_68457973',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '06e0197ee886b06603031f3973b6361dd4f1f5d9' => 
    array (
      0 => 'D:\\xampp\\htdocs\\wanna-eat\\wanna-eat\\templates\\order.tpl',
      1 => 1592950394,
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
function content_5ef27e7ba21ae6_68457973 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<main>
    <div class="container">
        <h1 class="text-center my-3 h3"> 訂餐</h1>
        <hr>
        <div class="row pt-4">
            <div class="m-auto w-50">
                <form action="order.php" method="post" enctype="multipart/form-data">


                    <button onclick="getData( <?php ob_start();
echo $_smarty_tpl->tpl_vars['id']->value;
$_prefixVariable1 = ob_get_clean();
if (isset($_prefixVariable1)) {?> <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 <?php }?> ); return false;">接收數據</button>

                                        <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
                        <div class="form-group text-danger">
                            <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

                        </div>
                    <?php }?>
                    <div class="form-group">
                        <label class="w-75">店家名稱
                            <input type="hidden" name="id" value="">
                            <input type="text" name="name" class="form-control" value=""
                                   placeholder="請輸入店家名稱">
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="w-75">店家電話
                            <input type="text" name="phone" class="form-control" value=""
                                   placeholder="請輸入店家電話">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>上傳菜單
                            <input type="file" name="images" class="form-control-file">
                        </label>
                        <img src="" alt="">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary mb-2 rounded-0 px-4">送出</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>
<?php $_smarty_tpl->_subTemplateRender("file:js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

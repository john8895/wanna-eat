<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-20 00:42:19
  from 'D:\xampp\htdocs\wanna-eat\wanna-eat\templates\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eed3f4bdf9755_37748538',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2ad5797bfdaf57d14031162fb6fb9fbd7eaa72b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\wanna-eat\\wanna-eat\\templates\\add.tpl',
      1 => 1592606330,
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
function content_5eed3f4bdf9755_37748538 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<main>
    <div class="container">
        <h1 class="text-center my-3 h3">今天要吃啥？新增店家</h1>
        <hr>
        <div class="row pt-4">
            <div class="m-auto w-50">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="w-75">店家名稱
                            <input type="text" name="store_name" class="form-control" value="" placeholder="請輸入店家名稱">
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="w-75">店家電話
                            <input type="text" name="store_phone" class="form-control" value="" placeholder="請輸入店家電話">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>上傳菜單
                            <input type="file" name="store_file" class="form-control-file">
                        </label>
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

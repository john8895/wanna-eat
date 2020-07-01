<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-01 06:50:15
  from 'D:\xampp\htdocs\wanna-eat\wanna-eat\templates\index\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efc1607c319e5_79244017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af28998661cb309fb9c6dc50108aba14a4f339d7' => 
    array (
      0 => 'D:\\xampp\\htdocs\\wanna-eat\\wanna-eat\\templates\\index\\index.tpl',
      1 => 1593579015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efc1607c319e5_79244017 (Smarty_Internal_Template $_smarty_tpl) {
?><main xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-bind="http://www.w3.org/1999/xhtml">
    <section>
        <div class="container" id="app">
            <div class="row">
                <div class="col-sm-12 text-center mb-5">
                    <a href="" class="btn btn-info mr-2" id="wanna_eat">今天要吃啥？</a>
                </div>
            </div>


            <section>
                <!-- 訂單狀態-->
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <h4>進行中的訂單</h4>
                    </div>
                    <div class="col-sm-12">
                        <ul>
                            <li>預估金額：$0</li>
                            <li>目前金額：$0</li>
                            <li>阿翰開的炒飯超人</li>
                            <li>
                                <button>我也要訂</button>
                            </li>
                        </ul>
                    </div>
                </div>


                <!-- 訂單-->
                <div class="row">
                    <div class="col-sm-12">
                        <h4>我也要訂</h4>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label> 姓名
                                <input type="text" value="阿翰">
                            </label>
                            <label> 餐點名
                                <input type="text" value="排骨飯">
                            </label>
                            <label> 價錢
                                <input type="text" value="85">
                            </label>
                            <label> 備註
                                <input type="text" value="小辣">
                            </label>
                            <button>加訂單</button>
                        </div>
                    </div>
                </div>
            </section>


            <div class="row">

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['stores']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <div class="col-sm-3">
                    <article class="d-flex store-item mb-3">
                        <div class="store-image">
                            <svg class="icon" viewBox="0 0 416 512">
                                <path d="M207.9 15.2c.8 4.7 16.1 94.5 16.1 128.8 0 52.3-27.8 89.6-68.9 104.6L168 486.7c.7 13.7-10.2 25.3-24 25.3H80c-13.7 0-24.7-11.5-24-25.3l12.9-238.1C27.7 233.6 0 196.2 0 144 0 109.6 15.3 19.9 16.1 15.2 19.3-5.1 61.4-5.4 64 16.3v141.2c1.3 3.4 15.1 3.2 16 0 1.4-25.3 7.9-139.2 8-141.8 3.3-20.8 44.7-20.8 47.9 0 .2 2.7 6.6 116.5 8 141.8.9 3.2 14.8 3.4 16 0V16.3c2.6-21.6 44.8-21.4 48-1.1zm119.2 285.7l-15 185.1c-1.2 14 9.9 26 23.9 26h56c13.3 0 24-10.7 24-24V24c0-13.2-10.7-24-24-24-82.5 0-221.4 178.5-64.9 300.9z"></path>
                            </svg>
                        </div>
                        <div class="store-text">
                            <input type="hidden" class="item_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                            <ul>
                                <li>名稱：<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
 </li>
                                <li>電話：<?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
 </li>
                                <li>
                                    <div class="store-button mt-1">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['images'];?>
"
                                           class="btn btn-outline-primary btn-sm btn-pill px-2 btn-menu"
                                           target="_blank">菜單</a>
                                        <a href="group-buy.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="btn btn-danger btn-sm btn-pill px-2">
                                            開團
                                        </a>
                                        <?php if (isset($_smarty_tpl->tpl_vars['logged']->value) && $_smarty_tpl->tpl_vars['logged']->value) {?>
                                            <a href="edit.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="btn btn-outline-info btn-sm px-2">編輯</a>
                                            <a href="delete.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="btn btn-outline-danger btn-sm px-2">刪除</a>
                                        <?php }?>
                                    </div>
                                </li>
                                <li class="image_show">
                                    <div class="modal">
                                        <div class="modal-body d-flex align-items-center justify-content-center">
                                            <div class="img"></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </article>
                </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

            </div>
        </div>
    </section>
</main><?php }
}

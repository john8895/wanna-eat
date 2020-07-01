<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-01 04:33:50
  from 'D:\xampp\htdocs\wanna-eat\wanna-eat\templates\group-buy.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efbf60e8226e6_62528172',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '098a19332295f8747eeb75ca8a385cc119341496' => 
    array (
      0 => 'D:\\xampp\\htdocs\\wanna-eat\\wanna-eat\\templates\\group-buy.tpl',
      1 => 1593563048,
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
function content_5efbf60e8226e6_62528172 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<main>
    <div class="container">
        <!-- 開團 -->
        <div v-if="orderDisplay" class="row modal-wrap">
            <div class="col-sm-12">
                <input type="hidden" name="id" :value="orders.id">
                <ul class="store-text">
                    <li>開團人：<select name="" id="">
                            <option value="阿翰">阿翰</option>
                        </select>
                        <button>新增負責人</button>
                    </li>
                    <li>店家名稱：%% orders.name %%</li>
                    <li>店家電話：%% orders.phone %%</li>
                    <li>簡介：排骨飯比雞排飯好吃，肉很大塊</li>
                    <li>菜單：<a v-bind:href="orders.images"
                              class="btn btn-outline-primary btn-sm btn-pill px-2 btn-menu">菜單</a></li>
                    <li class="image_show">
                        <div class="modal">
                            <div class="modal-body d-flex align-items-center justify-content-center">
                                <div class="img"></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <label>截止時間：
                            <input type="text" value="1200">
                        </label>
                    </li>
                    <li>
                        <label>注意事項：
                            <input type="text" value="老闆很凶會罵人">
                        </label>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 ">
                <div class="form-group">
                    <button class="btn btn-danger" @click="saveOrder">開始團購囉</button>
                    <button @click="orderDisplay = false">取消</button>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $_smarty_tpl->_subTemplateRender("file:js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

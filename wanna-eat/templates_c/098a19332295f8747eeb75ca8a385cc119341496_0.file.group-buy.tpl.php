<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-02 15:08:21
  from 'D:\xampp\htdocs\wanna-eat\wanna-eat\templates\group-buy.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5efddc45a45c13_77651059',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '098a19332295f8747eeb75ca8a385cc119341496' => 
    array (
      0 => 'D:\\xampp\\htdocs\\wanna-eat\\wanna-eat\\templates\\group-buy.tpl',
      1 => 1593694587,
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
function content_5efddc45a45c13_77651059 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\xampp\\htdocs\\wanna-eat\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<main>
    <div class="container">
        <!-- 開團 -->
        <div class="row modal-wrap">
            <form action="group-buy.php" method="post">
                <div class="col-sm-12 store-item">
                    <input type="hidden" name="id" value="orders.id">
                    <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
                        <div class="form-group text-danger">
                            <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

                        </div>
                    <?php }?>
                    <ul class="store-text">
                        <li>負責人：
                            <select name="group_host">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hosts']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['host_name'];?>
" name="host_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['host_name'];?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                            <button>新增負責人</button>
                        </li>
                        <li>店家名稱：<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="store_name" readonly
                                        class="form-control"></li>
                        <li>店家電話：<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
" name="store_phone" readonly
                                        class="form-control"></li>
                        <li>簡介：排骨飯比雞排飯好吃，肉很大塊</li>
                        <li>菜單：<a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['images'];?>
"
                                  class="btn btn-outline-primary btn-sm btn-pill px-2 btn-menu">菜單</a></li>
                        <li class="image_show">
                            <div class="modal">
                                <div class="modal-body d-flex align-items-center justify-content-center">
                                    <div class="img"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form-row">
                                <label>截止時間*
                                        <input type="text" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['time']->value,"%Y-%m-%d");?>
" name="endTime_day" required class="form-control">
                                        <input type="text" value="10-00" name="end_time_hour" required class="form-control">
                                </label>

                            </div>

                        </li>
                        <li>
                            <label>注意事項：
                                <input type="text" value="老闆很凶會罵人" name="remark" class="form-control">
                            </label>
                        </li>
                    </ul>

                    <div class="form-group">
                        <button class="btn btn-danger">開始團購囉</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php $_smarty_tpl->_subTemplateRender("file:js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

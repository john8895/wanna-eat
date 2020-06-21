<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-21 10:29:27
  from 'D:\xampp\htdocs\wanna-eat\wanna-eat\templates\js.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eef1a67a9cf31_15621434',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1776f821f9d23dd002fa5e8c60cd0cf5cf8c373' => 
    array (
      0 => 'D:\\xampp\\htdocs\\wanna-eat\\wanna-eat\\templates\\js.tpl',
      1 => 1592728167,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eef1a67a9cf31_15621434 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="./language/js/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./language/js/bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(function () {

        $('.btn-menu').on('click', function (e) {
            e.preventDefault();
            let img_path = $(this).attr('href');
            let modal = $(this).parents('.store-text').find('.modal');
            let height = $(document).height();
            let step = 1;

            // 顯示modal
            modal.slideDown('fast');
            // 插入圖片
            modal.find('.img').replaceWith('<img src="' + img_path + '" style="max-height: ' + height + 'px">')

            // 關閉modal
            modal.on('click', function (e) {
                $(this).slideUp('fast');
                modal.children('.modal-body').removeAttr('style');
            }).on('mousewheel', function (e) {
                // console.log(e.originalEvent.wheelDelta > 0);
                if(e.originalEvent.wheelDelta > 0){
                    step -= 1 / 10
                }else {
                    step += 1 / 10
                }
                modal.find('img').css('transform', 'scale(' + step + ')');
            })

        })
    })
<?php echo '</script'; ?>
>
</body>
</html><?php }
}

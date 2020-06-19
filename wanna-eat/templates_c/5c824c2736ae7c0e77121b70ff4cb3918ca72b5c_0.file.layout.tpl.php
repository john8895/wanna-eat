<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-19 16:54:09
  from 'D:\xampp\htdocs\myphp\projects\wanna-eat\wanna-eat\templates\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eecd1910aea37_83772350',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c824c2736ae7c0e77121b70ff4cb3918ca72b5c' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myphp\\projects\\wanna-eat\\wanna-eat\\templates\\layout.tpl',
      1 => 1592578424,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:header.tpl' => 1,
    'file:index/index.tpl' => 1,
    'file:js.tpl' => 1,
  ),
),false)) {
function content_5eecd1910aea37_83772350 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>
<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:index/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}

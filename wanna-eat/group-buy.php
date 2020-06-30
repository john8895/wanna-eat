<?php
/* filename: group-buy.tpl.php */

require_once("../libs/Smarty.class.php");
/** Connect Mysql */
require_once './php-component/connect.php';

global $smarty;
$smarty = new Smarty;

/** Check Login Status */
require_once './php-component/check-login-inner.php';


// 如果有帶參數 GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['id'])) exit('<h1>必須指定參數</h1>');
    show_table($smarty);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    group_buy($smarty);
}

// 顯示數據
function show_table($smarty)
{
    $sql = "SELECT * FROM store WHERE id = {$_GET['id']} LIMIT 1";
    $result = connect_mysql($sql);
    $fetch_assoc = mysqli_fetch_assoc($result);
    $smarty->assign('item', $fetch_assoc);
}




if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->display("./templates/group-buy.tpl");
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
    show_host($smarty);
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


// 顯示負責人
function show_host($smarty)
{
    $sql = "SELECT * FROM hosts";
    $result = connect_mysql($sql);
    while ($rows = mysqli_fetch_assoc($result)) {
        $hosts[] = $rows;
    }
    $smarty->assign('hosts', $hosts);
}


// 團購
function group_buy($smarty)
{
    if (!$_POST['host'] || !$_POST['end_time'] || !$_POST['remark'] || !$_POST['store_name'] || !$_POST['store_phone']) {
        $GLOBALS['error_message'] = '請正常使用表單';
        return;
    }
    if (empty($_POST['end_time'])) {
        $GLOBALS['error_message'] = '必須填寫截止時間';
        return;
    }

    $group_buy['store_host'] = $_POST['store_host'];
    $group_buy['store_name'] = $_POST['store_name'];
    $group_buy['host'] = $_POST['host'];
    $group_buy['end_time'] = $_POST['end_time'];
    $group_buy['remark'] = $_POST['remark'];

    // save
    $sql = "";
    var_dump($group_buy);

}


if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->display("./templates/group-buy.tpl");
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
    if (!$_POST['store_name'] ||
        !$_POST['store_phone'] ||
        !$_POST['group_host'] ||
        !$_POST['endTime_day'] ||
        !$_POST['end_time_hour'] ||
        !$_POST['remark']) {
        $GLOBALS['error_message'] = '請正常使用表單';
        return;
    }
    if (empty($_POST['endTime_day']) || empty($_POST['end_time_hour'])) {
        $GLOBALS['error_message'] = '必須填寫截止時間';
        return;
    }

    // 校驗日期時間
    // $_POST['endTime_day'] = '07-02'
    if(!validationTime($_POST['endTime_day'])) {
        $GLOBALS['error_message'] = '截止日期格式錯誤';
        return;
    }
    //  $_POST['end_time'] = '12-00'
    if(!validationTime($_POST['end_time_hour'])) {
        $GLOBALS['error_message'] = '截止時間格式錯誤';
        return;
    }

    // TODO:合併日期與時間
    $end_time = $_POST['endTime_day'] . ' ' . $_POST['end_time_hour'];

    $group_buy['store_name'] = $_POST['store_name'];
    $group_buy['store_phone'] = $_POST['store_phone'];
    $group_buy['group_host'] = $_POST['group_host'];
    $group_buy['remark'] = $_POST['remark'];

    // save
    $sql = "INSERT INTO group_buy VALUES (null, '{$group_buy['store_name']}', '{$group_buy['store_phone']}', '{$group_buy['group_host']}', '{$end_time}', '{$group_buy['remark']}');";
//    var_dump($sql);
    connect_mysql($sql);
    header('Location: index.php');

}


// 校驗日期時間
function validationTime($subject){
    $pattern = '/\d{2}-\d{2}/';
    return preg_match($pattern, $subject);
}

if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->assign('time', time());  // time
$smarty->display("./templates/group-buy.tpl");
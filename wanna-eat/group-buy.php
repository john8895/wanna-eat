<?php
/* filename: group-buy.tpl.php */

require_once("../libs/Smarty.class.php");
/** Connect Mysql */
require_once './assets/inc/connect.php';

global $smarty;
$smarty = new Smarty;

/** Check Login Status */
require_once './assets/inc/check-login-inner.php';


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
    if (!validationTime($_POST['endTime_day'])) {
        $GLOBALS['error_message'] = '截止日期格式錯誤';
        return;
    }
    //  $_POST['end_time'] = '12-00'
    if (!validationTime($_POST['end_time_hour'])) {
        $GLOBALS['error_message'] = '截止時間格式錯誤';
        return;
    }

    // 合併日期與時間
    $end_time = $_POST['endTime_day'] . ' ' . $_POST['end_time_hour'];

    $group_buy['store_name'] = $_POST['store_name'];
    $group_buy['store_phone'] = $_POST['store_phone'];
    $group_buy['group_host'] = $_POST['group_host'];
    $group_buy['remark'] = $_POST['remark'];

    // 生成時間id
    $group_buy['id'] = generateTimeId();

    // 接收訂單數據
    if (!(empty($_POST['order_name']) || empty($_POST['order_content']) || empty($_POST['order_price']))) {
        // 如果不為空 則校驗並接收
        saveOrderData($group_buy['id']);
    }

    // Save to Mysql
    $sql = "INSERT INTO group_buy VALUES ({$group_buy['id']}, '{$group_buy['store_name']}', '{$group_buy['store_phone']}', '{$group_buy['group_host']}', '{$end_time}', '{$group_buy['remark']}');";
    connect_mysql($sql);
}


// 校驗並儲存訂單
function saveOrderData($order_id)
{
    if(!$order_id) exit('<h1>必須傳入訂單編號</h1>');

    // 如果欄位沒填完整
    if (empty($_POST['order_name']) ||
        empty($_POST['order_content']) ||
        empty($_POST['order_price'])) {
        $GLOBALS['error_message'] = '訂單資料不完全';
        return;
    }

    // 接收數據
    $order['order_name'] = $_POST['order_name'];
    $order['order_content'] = $_POST['order_content'];
    $order['order_price'] = $_POST['order_price'];
    $order['order_remark'] = $_POST['order_remark'];

    // save
    $sql = "INSERT INTO orders VALUES ({$order_id}, '{$order['order_name']}', '{$order['order_content']}', {$order['order_price']}, '{$order['order_remark']}');";
    connect_mysql($sql);
    header('Location: index.php');
}


// 校驗日期時間
function validationTime($subject)
{
    // TODO 分別校驗日期、時間， 07-15=01-12, 00-59   12-00=00-23, 00-59
    $date_pattern = '/\b[0-1][0-9]-[0-3][0-9]/';
    $time_pattern = '/^([0-1][0-9]|2[0-3])-[0-5][0-9]$/';
    $pattern = '/\d{2}-\d{2}/';
    return preg_match($pattern, $subject);
}


// 產生時間 id
function generateTimeId(){
    // 用日期時間當訂單id，group_buy，orders也存入相同ID，就能以ID找訂單
    $nowTime =  date('ymd H:i:s', time());  // 取得現在年月日 時分秒
    $patten = '/\s|:/';
    return preg_replace($patten, '', $nowTime);  // 2007041420
}


if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->assign('date', time());  // date
$smarty->assign('time', date('H-i', strtotime("+30 minute")));  // 取得現在 時-分 +10分 ex: 15-06
$smarty->display("./templates/group-buy.tpl");
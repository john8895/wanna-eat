<?php
/* filename: group-buy.php */
require_once("../libs/Smarty.class.php");
require_once './assets/inc/connect.php';  // Connect Mysql
global $smarty;
$smarty = new Smarty;
require_once './assets/inc/check-login-inner.php';  // Check Login Status


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['id'])) header('Location: index.php');
    groupHostDisplay($smarty);
    groupBuyDisplay($smarty);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    groupBuySubmit();
}


/** Store display
 * @param $smarty
 */
function groupBuyDisplay($smarty)
{
    $order['field_id'] = uniqid();  // Unique field id
    $smarty->assign('field_id', $order['field_id']);

    $sql = "SELECT * FROM store WHERE id = {$_GET['id']} LIMIT 1";
    $result = connect_mysql($sql);
    $fetch_assoc = mysqli_fetch_assoc($result);
    $smarty->assign('store_id', $_GET['id']);  // Store id
    $smarty->assign('item', $fetch_assoc);
}


/** Host display
 * @param $smarty
 */
function groupHostDisplay($smarty)
{
    $sql = "SELECT * FROM hosts";
    $result = connect_mysql($sql);
    $hosts = array();
    while ($rows = mysqli_fetch_assoc($result)) {
        $hosts[] = $rows;
    }
    $smarty->assign('hosts', $hosts);
}


/** Group-buy information display
 */
function groupBuySubmit()
{
//    if (!$_POST['store_name'] ||
//        !$_POST['store_phone'] ||
//        !$_POST['group_host'] ||
//        !$_POST['endTime_day'] ||
//        !$_POST['end_time_hour'] ||
//        !$_POST['remark']) {
//        $GLOBALS['error_message'] = '請正常使用表單';
//        return;
//    }
    if (empty($_POST['endTime_day']) || empty($_POST['end_time_hour'])) {
        $GLOBALS['error_message'] = '必須填寫截止時間';
        return;
    }
    if(!($_POST['group_host_new']) && $_POST['group_host'] === '0'){
        $GLOBALS['error_message'] = '必須填寫團購負責人';
        return;
    }


    if(!($_POST['group_host_new'])){
        $group_buy['group_host'] = $_POST['group_host'];
    }else{
        $group_buy['group_host'] = $_POST['group_host_new'];
    }

    // 校驗日期時間
    // $_POST['endTime_day'] = '07-02'
    if (!validationTime($_POST['endTime_day'], 'date')) {
        $GLOBALS['error_message'] = '截止日期格式錯誤';
        return;
    }
    //  $_POST['end_time'] = '12-00'
    if (!validationTime($_POST['end_time_hour'], 'time')) {
        $GLOBALS['error_message'] = '截止時間格式錯誤';
        return;
    }

    // 合併日期與時間
    $end_time = $_POST['endTime_day'] . ' ' . $_POST['end_time_hour'];
    $group_buy['store_id'] = $_POST['store_id'];
    $group_buy['store_name'] = $_POST['store_name'];
    $group_buy['store_phone'] = $_POST['store_phone'];
//    $group_buy['group_host'] = $_POST['group_host'];
    $group_buy['remark'] = $_POST['remark'];
    $group_buy['order_field_id'] = $_POST['order_field_id'];
    $group_buy['id'] = generateTimeId();  // Generate Time id

    // 接收訂單數據
//    if (empty($_POST['order_name']) || empty($_POST['order_meal']) || empty($_POST['order_price'])){
//        $GLOBALS['error_message'] = '訂單資料全都要填寫';
//        return;
//    }

    // Save order  如果不為空 則校驗並接收
//    saveOrderData($group_buy['id'], $group_buy['order_field_id']);

    // Save to Mysql
    $sql = "INSERT INTO group_buy (id, store_name, store_phone, group_host, end_time, remark, store_id) VALUES ({$group_buy['id']}, '{$group_buy['store_name']}', '{$group_buy['store_phone']}', '{$group_buy['group_host']}', '{$end_time}', '{$group_buy['remark']}',{$group_buy['store_id']});";
    connect_mysql($sql);
    header('Location: group-buy-now.php');
}


/** Check order status and save data
 * @param $order_id
 * @param $field_id
 */
function saveOrderData($order_id, $field_id)
{
    if (!$order_id) exit('<h1>必須傳入訂單編號</h1>');

    // 如果欄位沒填完整
    if (empty($_POST['order_name']) ||
        empty($_POST['order_meal']) ||
        empty($_POST['order_price'])) {
        $GLOBALS['error_message'] = '訂單資料不完全';
        return;
    }

    // 接收數據
    $order['order_name'] = $_POST['order_name'];
    $order['order_meal'] = $_POST['order_meal'];
    $order['order_price'] = $_POST['order_price'];
    $order['order_remark'] = $_POST['order_remark'];

    // save
    $sql = "INSERT INTO orders (order_id, order_name, order_meal, order_price, order_remark, field_id) VALUES ({$order_id}, '{$order['order_name']}', '{$order['order_meal']}', {$order['order_price']}, '{$order['order_remark']}', '{$field_id}');";
    connect_mysql($sql);
    header('Location: index.php');
}


// 校驗日期時間
/** Validation time
 * @param $subject
 * @return false|int
 */
function validationTime($subject, $type)
{
    // TODO 分別校驗日期、時間， 07-15=01-12, 00-59   12-00=00-23, 00-59
    $date_pattern = '/\b2020\/[0-1][0-9]\/[0-3][0-9]/';
    $time_pattern = '/^([0-1][0-9]|2[0-3]):[0-5][0-9]$/';
//    $pattern = '/\d{2}-\d{2}/';
    $pattern = $type === 'date' ? $date_pattern : $time_pattern;
    return preg_match($pattern, $subject);
}


/** Generate time id */
function generateTimeId()
{
    // 用日期時間當訂單id，group_buy，orders也存入相同ID，就能以ID找訂單
    $nowTime = date('ymd H:i:s', time());  // 取得現在年月日 時分秒
    $patten = '/\s|:/';
    return preg_replace($patten, '', $nowTime);  // 2007041420
}


if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->assign('date', time());  // date
$smarty->assign('time', date('H-i', strtotime("+30 minute")));  // 取得現在 時-分 +10分 ex: 15-06
$smarty->display("./templates/group-buy.tpl");
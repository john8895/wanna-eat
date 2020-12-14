<?php
/** Connect Mysql */
require_once './assets/inc/connect.php';
require_once './assets/inc/config.php';
require_once("../libs/Smarty.class.php");

global $smarty;
$smarty = new Smarty;

/** Check Login Status */
//require_once './assets/inc/check-login-inner.php';

global $order_id;

//if ($_SERVER['REQUEST_METHOD'] !== 'GET') exit('<h1>失敗</h1>');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['id'])) {
        exit('<h1>必須有參數</h1>');
//        header('Location: index.php');
    }
    $order_id = $_GET['id'];
    orderDisplay($smarty, $order_id);  // Order display
    groupDisplay($smarty);
    $smarty->assign('order_id', $order_id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    orderHandler();
}


// Order data receive
//function orderHandler(){
//    if(!(isset($_POST['order_name']) ||
//        isset($_POST['order_content']) ||
//        isset($_POST['order_price']) ||
//        isset($_POST['order_remark']))){
//        $GLOBALS['error_message'] = '請正常使用表單';
//        return;
//    }
//
//    if(empty($_POST['order_name'])) $GLOBALS['error_message'] = '姓名不能為空'; return;
//
//}


// Order Display
function groupDisplay($smarty)
{
    $sql = "SELECT * FROM group_buy WHERE id = {$_GET['id']} LIMIT 1";
    $result = connect_mysql($sql);
    $group_buy_item = mysqli_fetch_assoc($result);

//    var_dump(strtotime($group_buy_item['end_time']), time());
    $current_time = time();
    $order_end_time = strtotime($group_buy_item['end_time']);
    $time_up = false;
    if ($order_end_time <= $current_time){
        $time_up = true;
    }

    storeDisplay($smarty, $group_buy_item['store_id']);  // Store display
    $smarty->assign('time_up', $time_up);
    $smarty->assign('item', $group_buy_item);
}


// Store display
function storeDisplay($smarty, $store_id)
{
    $sql = "SELECT * FROM store WHERE id = {$store_id} LIMIT 1";
    $result = connect_mysql($sql);
    $store_item = mysqli_fetch_assoc($result);
    if (!$store_item){
        $GLOBALS['error_message'] = '請留意！此商家的資料已被刪除';
        $smarty->assign('store', null);
        return;
    }
    $smarty->assign('store', $store_item);
}


// Order display
function orderDisplay($smarty, $order_id)
{
    $sql = "SELECT * FROM orders WHERE `order_id` = {$order_id} LIMIT 1";
    $result = connect_mysql($sql);
    $order_item = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $order_item[] = $row;
    }
    $smarty->assign('order_array', $order_item);
}






/** Output **/
if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->assign('_POST', $_POST);
$smarty->display("./templates/order.tpl");
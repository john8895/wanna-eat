<?php
require_once("../libs/Smarty.class.php");
global $smarty;
$smarty = new Smarty;


// 用SESSION判斷是否有登入，如果沒登入就跳轉頁面
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    echo '您已登入';
    $logged = true;
} else {
    $logged = false;
//    header('Location: index.php');
}
//var_dump('$logged', $logged);
$smarty->assign('logged', $logged);


/**
 * 後端傳送數據
 */
//if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//    $store = [
//        "name" => "龍皮魚丸店",
//        "phone" => "04-123456"
//    ];
//    $json_data = json_encode($store, JSON_UNESCAPED_UNICODE);
//    echo $json_data;
//}


if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->display("./templates/order.tpl");
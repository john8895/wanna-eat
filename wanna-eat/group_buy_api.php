<?php
/** Connect Mysql */
require_once './assets/inc/connect.php';
require_once './assets/inc/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    getOrder();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'POST';
}


function getOrder()
{
    $sql = "SELECT * FROM group_buy";
    $result = connect_mysql($sql);

    $new_item = array();
    while ($item = $result->fetch_assoc()) {
        $now = date('Y-m-d H-i-s');
        if($item['end_time'] < $now){  // 如果截止日比當前早表示已過期，就不顯示
            continue;
        }
        $new_item[] = $item;
    }
//    var_dump($new_item);
    $json_data = json_encode($new_item, JSON_UNESCAPED_UNICODE);  // 轉為json格式，轉譯處理中文
    echo $json_data;
    $result->close();
}



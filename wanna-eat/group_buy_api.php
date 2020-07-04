<?php
/** Connect Mysql */
require_once './assets/inc/connect.php';
require_once './assets/inc/config.php';

//if ($_SERVER['REQUEST_METHOD'] !== 'GET') exit('<h1>失敗</h1>');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['res'])) return;
    if ($_GET['res'] === 'buy') getGroupBuy();
    if ($_GET['res'] === 'group') getOrders();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    submitOrder();
}


// Get group_buy data
function getGroupBuy()
{
    $result = connect_mysql("SELECT * FROM group_buy");
    $new_item = array();
    while ($item = $result->fetch_assoc()) {
        $now = date('Y-m-d H-i-s');
        if ($item['end_time'] < $now) {  // 如果截止日比當前早表示已過期，就不顯示
            continue;
        }
        $new_item[] = $item;
    }
    $json_data = json_encode($new_item, JSON_UNESCAPED_UNICODE);  // 轉為json格式，轉譯處理中文
    echo $json_data;
    $result->close();
}


// Get orders
function getOrders()
{
    $result = connect_mysql("SELECT * FROM orders");
    $new_item = array();
    while ($item = $result->fetch_assoc()) {
        $new_item[] = $item;
    }
    $order_json_data = json_encode($new_item, JSON_UNESCAPED_UNICODE);  // 轉為json格式，轉譯處理中文
    echo $order_json_data;
    $result->close();
}

// Post orders
function submitOrder()
{

//    if (!(isset($_POST['add_order_id']) ||
//        isset($_POST['add_order_name']) ||
//        isset($_POST['add_order_content']) ||
//        isset($_POST['add_order_price']) ||
//        isset($_POST['add_order_remark']))
//    ) {
//        echo '請正常使用表單';
//    }

    $orderData['order_id'] = $_POST['order_id'];
    $orderData['order_name'] = $_POST['order_name'];
    $orderData['order_content'] = $_POST['order_content'];
    $orderData['order_price'] = $_POST['order_price'];
    $orderData['order_remark'] = $_POST['order_remark'];

    $sql = "INSERT INTO orders VALUES ({$orderData['order_id']}, '{$orderData['order_name']}', '{$orderData['order_content']}', {$orderData['order_price']}, '{$orderData['order_remark']}')";
    connect_mysql($sql);
    echo 'success';
//    $new_item = array();
//    while ($item = $result->fetch_assoc()) {
//        $new_item[] = $item;
//    }
//    $order_json_data = json_encode($new_item, JSON_UNESCAPED_UNICODE);  // 轉為json格式，轉譯處理中文
//    echo $order_json_data;
//    $result->close();
}
<?php
/** Connect Mysql */
require_once './assets/inc/connect.php';
require_once './assets/inc/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    foreach ($_GET as $key => $value) {
        switch ($key) {
            case 'res':
                switch ($value) {
                    case 'buy':
                        getGroupBuy();
                        break;
                    case 'total_orders':
                        getOrders();
                        break;
                    case 'order_list':
                        if (!$_GET['order_id'] || empty($_GET['order_id'])) {
                            echo 'Invalid order id';
                            return;
                        }
                        $_order_id = $_GET['order_id'];
                        getOrderList($_order_id);
                        break;
                }
                break;

            // Delete orders
            case 'del':
                deleteOrder();
                break;

            // Delete group-buy
            case 'del_group':
                deleteGroupBuy();
                break;

            default:
                break;
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_order'])) submitOrder();
    if (isset($_POST['edit_order'])) editOrder();
}


/**
 * @Range: group-buy.php
 *
 * Get group_buy data
 *
 */
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
//    $json_data = json_encode($new_item, JSON_UNESCAPED_UNICODE);  // 轉為json格式，轉譯處理中文
    $json_data = json_encode($new_item);  // 轉為json格式，轉譯處理中文
    echo $json_data;
    $result->close();
}


/** Get orders in index.php */
function getOrders()
{
    $sql = "SELECT * FROM orders";
    $result = connect_mysql($sql);
    $new_item = array();
    while ($item = $result->fetch_assoc()) {
        $new_item[] = $item;
    }
//    $order_json_data = json_encode($new_item, JSON_UNESCAPED_UNICODE);  // 轉為json格式，轉譯處理中文
    $order_json_data = json_encode($new_item);  // 轉為json格式，轉譯處理中文
    echo $order_json_data;
    $result->close();
}


/** Post orders */
function submitOrder()
{
    $orderData['order_id'] = $_POST['order_id'];
    $orderData['order_name'] = $_POST['order_name'];
    $orderData['order_meal'] = $_POST['order_meal'];
    $orderData['order_price'] = $_POST['order_price'];
    $orderData['order_remark'] = $_POST['order_remark'];
    $orderData['field_id'] = uniqid();  // Unique field id


    // Save data to mysql
    $sql = "INSERT INTO orders (order_id, order_name, order_meal, order_price, order_remark, field_id) VALUES ({$orderData['order_id']}, '{$orderData['order_name']}', '{$orderData['order_meal']}', {$orderData['order_price']}, '{$orderData['order_remark']}', '{$orderData['field_id']}')";
    connect_mysql($sql);
    echo 'success';
}


/** Get order in order.php
 * @param $_order_id
 */
function getOrderList($_order_id)
{
    $sql = "SELECT * FROM orders WHERE order_id='{$_order_id}'";
    $result = connect_mysql($sql);
    $new_item = array();
    while ($item = $result->fetch_assoc()) {
        $new_item[] = $item;
    }
    $order_json_data = json_encode($new_item);  // 轉為json格式，轉譯處理中文
//    $order_json_data = json_encode($new_item, JSON_UNESCAPED_UNICODE);  // 轉為json格式，轉譯處理中文
    echo $order_json_data;
    $result->close();
}


/** Edit order */
function editOrder()
{
    $order['order_id'] = $_POST['order_id'];
    $order['order_field_name'] = $_POST['order_field_name'];
    $order['order_field_value'] = $_POST['order_field_value'];
    $order['order_field_id'] = $_POST['field_id'];

    $sql = "UPDATE orders SET {$order['order_field_name']}='{$order['order_field_value']}' WHERE field_id='{$order['order_field_id']}';";
    connect_mysql($sql);
    echo 'success';
}


/** Delete order */
function deleteOrder()
{
    $delete_id = $_GET['del'];
    $sql = "DELETE FROM orders WHERE field_id='{$delete_id}';";
    connect_mysql($sql);
    echo 'success';
}


/** Delete group buy */
function deleteGroupBuy()
{
    $group_id = $_GET['del_group'];
    $sql = "DELETE FROM group_buy WHERE id='{$group_id}';";
    connect_mysql($sql);
    echo 'success';
}
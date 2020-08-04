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
                    case 'buy_history':
                        getGroupHistory();
                        break;
                    case 'total_orders':
                        getOrders();
                        break;
                    case 'stores':
                        getStores();
                        break;
                    case 'store':
                        getStore();
                        break;
                    case 'store_tags':
                        getStoreTags();
                        break;
                    case 'order_list':
                        if (!$_GET['order_id'] || empty($_GET['order_id'])) {
                            echo 'Invalid order id';
                            return;
                        }
                        $_order_id = $_GET['order_id'];
                        getOrderList($_order_id);
                        break;
                    case 'hostname':
                        getHhostName();
                        break;
                    case 'del_hostname':
                        deleteHostName();
                        break;
                    case 'del_tag':
                        deleteStoreTags();
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
    if (isset($_POST['count_order'])) orderTotal();
    if (isset($_POST['add_host_name'])) addHostName();
}


/**
 * @Range: group-buy.php
 *
 * Get group_buy data
 *
 * @throws Exception
 */
function getGroupBuy()
{
    $result = connect_mysql("SELECT * FROM group_buy");
    $new_item = array();
    while ($item = $result->fetch_assoc()) {
        $now = time();
        $end_time = strtotime($item['end_time']);  // conversion to timestamp

        if ($end_time < $now) {  // 如果截止日比當前早表示已過期，就不顯示
            continue;
        } else {
            $new_item[] = $item;
        }
    }
//    $json_data = json_encode($new_item, JSON_UNESCAPED_UNICODE);  // 轉為json格式，轉譯處理中文
    $json_data = json_encode($new_item);  // 轉為json格式，轉譯處理中文
    echo $json_data;
    $result->close();
}


function getGroupHistory()
{
    $result = connect_mysql("SELECT * FROM group_buy");
    $new_item = array();
    while ($item = $result->fetch_assoc()) {
        $now = date('Y-m-d H-i-s');
        if ($item['end_time'] > $now) {  // 如果截止日比當前晚表示未過期，就不顯示
            continue;
        }
        $new_item[] = $item;
    }
//    $json_data = json_encode($new_item, JSON_UNESCAPED_UNICODE);  // 轉為json格式，轉譯處理中文
    $json_data = json_encode($new_item);  // 轉為json格式，轉譯處理中文
    echo $json_data;
    $result->close();
}


/** Delete group buy */
function deleteGroupBuy()
{
    $group_id = $_GET['del_group'];
    $sql = "DELETE FROM group_buy WHERE id='{$group_id}';";
    connect_mysql($sql);
    echo 'success';
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


/** Get stores in group-buy-now.php */
function getStores()
{
    $sql = "SELECT * FROM store";
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

/** Get stores in order.php */
function getStore()
{
    $store_id = $_GET['store_id'];
    $sql = "SELECT * FROM store WHERE id={$store_id}";
    $result = connect_mysql($sql);
    $new_item = array();
    while ($row = $result->fetch_assoc()) {
        $new_item[] = $row;
    }
//    $order_json_data = json_encode($new_item, JSON_UNESCAPED_UNICODE);  // 轉為json格式，轉譯處理中文
    $order_json_data = json_encode($new_item[0]);  // 轉為json格式，轉譯處理中文
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
    $orderData['order_number'] = $_POST['order_number'];
    $orderData['order_remark'] = $_POST['order_remark'];
    $orderData['field_id'] = uniqid();  // Unique field id
    // Save data to mysql
    $sql = "INSERT INTO orders (order_id, order_name, order_meal, order_price, order_number, order_remark, field_id) VALUES ({$orderData['order_id']}, '{$orderData['order_name']}', '{$orderData['order_meal']}', {$orderData['order_price']}, {$orderData['order_number']}, '{$orderData['order_remark']}', '{$orderData['field_id']}')";
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
//    orderTotal($order['order_id']);
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


function orderTotal()
{
    $order_id = $_POST['order_id'];
    $sql = "SELECT * FROM orders WHERE order_id={$order_id}";
    $result = connect_mysql($sql);
    $new_item = array();
    while ($rows = $result->fetch_assoc()) {
        $new_item[] = $rows;
    }
    $result->close();
    $meal_obj = array();
    foreach ($new_item as $k => $v) {
        $meal_obj[$v['order_meal']][] = $v;
    }

    $new_meal = array();
    $totalBuyer = array();
//    $totalNumber = 0;
    $limit = 0;
    $temp_num = 0;

    foreach ($meal_obj as $k => $v) {
        if (count($v) > 1) {
            // 有超過1筆
            foreach ($v as $item) {
                $totalBuyer[] = $item['order_name'];
//                $totalNumber++;
                $temp_num += intval($item['order_number']);
                $limit = 1;  // 標記
            }
        } else {
//            $totalNumber++;
            $temp_num = (int)$v[0]['order_number'];
        }
        // TODO: 餐點名稱相同但價格不同時 應該要做出響應提示
        $new_meal[] = array(
            "meal" => $k,
            "price" => (int)$v[0]['order_price'],
            "order_number" => $temp_num,
            "totalBuyer" => count($v),  // 有幾個人點同一個餐
            "subTotal" => (int)($v[0]['order_price'] * $temp_num),
            "buyerName" => $limit !== 1 ? $v[0]['order_name'] : join(',', $totalBuyer),  // '阿貓,媽媽米,一原'
        );
        $totalBuyer = array();  // 清空array
        $limit = 0;  // 清除標記
//        $totalNumber = 0;
        $temp_num = 0;
    }
//    $order_json_data = json_encode($new_meal, JSON_UNESCAPED_UNICODE);  // 轉為json格式，轉譯處理中文
    $order_json_data = json_encode($new_meal);  // 轉為json格式，轉譯處理中文
    echo $order_json_data;
}


/** Add host name in edit-info.php
 */
function addHostName()
{
    $host_name = $_POST['host_name'];
    $sql = "INSERT INTO hosts (id, host_name) VALUES (null, '{$host_name}')";
    $result = connect_mysql($sql);
    if ($result) echo 'success';
}

function getHhostName()
{
    $sql = "SELECT * FROM hosts";
    $result = connect_mysql($sql);
    $new_result = array();
    while ($row = $result->fetch_assoc()) {
        $new_result[] = $row;
    }
    $order_json_data = json_encode($new_result);  // 轉為json格式，轉譯處理中文
    echo $order_json_data;
}

/** delete host name in edit-info.php
 */
function deleteHostName()
{
    $host_id = $_GET['host_id'];
    $sql = "DELETE FROM hosts WHERE id={$host_id}";
    if (!connect_mysql($sql)) echo 'error';
    echo 'success';
}

/** delete store tags in edit-info.php
 */
function deleteStoreTags()
{
//    if (empty($_GET['store_id']) || empty($_GET['store_tags'])) {
//        echo 'failure';
//        return;
//    }
    // 先找到數據，再將符合的TAG刪除，最後更新數據
    $store_id = $_GET['store_id'];
    $store_id_arr = explode(',', $store_id);  // tag 所屬的id
    $store_tags = $_GET['store_tags'];
    $store_tag_arr = explode(',', $store_tags);  // 要刪除的tag

    // id
    foreach ($store_id_arr as $k => $v) {
//        echo $v;  // 22 => id
        // 取出要刪除tag所屬id
        $sql = "SELECT * FROM store WHERE id={$v};";
        $result = connect_mysql($sql);
        $tags = "";
        while ($row = $result->fetch_assoc()){
            $tags = $row["store_tag"];
        }
        $data_tags = explode(',', $tags);  // 數據裡的tag

        foreach ($store_tag_arr as $k2 => $v2){
//            echo gettype($v2);
//            var_dump(in_array($v2, $tags_arr));

            // 刪除數據裡的tag
            if(in_array($v2, $data_tags)){
                var_dump($data_tags);
                // todo 如果要刪除的tag存在數據當中，就要從數據中刪除該string

            }

        }
    }
    die();
    $sql = "UPDATE store SET store_tag='外送,茶葉蛋' WHERE id={$v};";

    // tag




//    var_dump($store_id_arr);
//    $row = [];
//    while ($row = $store_id_arr){
//        echo $row;
//    }
    //


    foreach ($store_id_arr as $k => $v) {
        $sql = "UPDATE store SET store_tag='外送,茶葉蛋' WHERE id=22;";
        // TODO 找到store 要移除  $_GET['store_tags'] 2020.07.28
        echo $sql;
    }
    $sql = "UPDATE store SET store_tag='飯,麵' WHERE id={$store_id}";
    die();
//    $sql = "UPDATE FROM store WHERE id={$store_id}";
    if (!connect_mysql($sql)) echo 'error';
    echo 'success';
}

/** Get store tags */
function getStoreTags()
{
    $sql = "SELECT store_tag, id FROM store";
    $result = connect_mysql($sql);
    $new_item = array();
    while ($row = $result->fetch_assoc()) {
        $new_item[] = $row;
    }
    $json = json_encode($new_item);
    echo $json;
}
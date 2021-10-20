<?php
/** Connect Mysql */
require_once('./assets/inc/config.php');
require_once('assets/inc/connect.php');
require_once('assets/include/order.inc.php');
require_once('assets/include/store.inc.php');
require_once('assets/include/user.inc.php');
require_once('assets/include/groupbuy.inc.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    foreach ($_GET as $key => $value) {
        $store = new Store();
        $groupBuy = new GroupBuy();

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
            case 'request':
                switch ($value) {
                    case 'getStoreById':
                        $store->getStoreById();
                        break;
                    case 'getAllStores':
                        $store->getAllStores();
                        break;
                    case 'getAllGroupBuys':
                        $groupBuy->getAllGroupBuys();
                        break;
                    case 'getGroupBuyHistory':
                        $groupBuy->getGroupBuyHistory();
                        break;
                    default:
                        break;
                }
                break;
            // Close Order
            default:
                break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $method = $_POST['method'];
    $order = new Order();
    $store = new Store();
    $user = new User();

    switch ($method) {
        case 'recaptcha':
            $user->recaptchaValidate();
            break;
        case 'addStore':
            $store->addStore();
            break;
        case 'editStore':
            $store->editStore();
            break;
        case 'postOrder':
            $order->postOrder();
            break;
        case 'getFilterOrders':
            $order->getFilterOrders();
            break;
        case 'editOrder':
            $order->editOrder();
            break;
        case 'continueOrder':
            $order->continueOrder();
            break;
        case 'closeOrder':
            $order->closeOrder();
            break;
        case 'deleteOrder':
            $order->deleteOrder();
            break;
        case 'postRating':
            $order->postRating();
            break;
        case 'register':
            $user->register();
            break;
        default:
            break;
    }

    if (isset($_POST['add_host_name'])) addHostName();
    if (isset($_POST['group_id'])) deleteGroupBuy();
}


/**
 * @Range: group-buy.php
 * Get group_buy data
 * @throws Exception
 */
function getGroupBuy()
{
    $result = connect_mysql("SELECT * FROM group_buy ORDER BY end_time DESC");
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
    $json_data = json_encode($new_item, JSON_UNESCAPED_UNICODE);  // 轉為json格式，轉譯處理中文
    echo $json_data;
    $result->close();
}


function getGroupHistory()
{
    $result = connect_mysql("SELECT * FROM group_buy ORDER BY end_time DESC");
    $new_item = array();
    while ($item = $result->fetch_assoc()) {
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
    $group_id = $_POST['group_id'];
    session_start();
    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        echo 'error';  // Login Failed
    } else {
        $sql = "DELETE FROM group_buy WHERE id='{$group_id}';";
        connect_mysql($sql);
        echo 'success';
    }
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

/** Delete order */
function deleteOrder()
{
    $delete_id = $_GET['del'];
    $sql = "DELETE FROM orders WHERE field_id='{$delete_id}';";
    connect_mysql($sql);
    echo 'success';
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
//    echo $store_tags;
    $data_tags = array();
    // id
    foreach ($store_id_arr as $k => $v) {
//        echo $v;  // 22 => id
        // 取出要刪除tag所屬id
        $sql = "SELECT * FROM store WHERE id={$v};";
        $result = connect_mysql($sql);
        $tags = "";
        while ($row = $result->fetch_assoc()) {
            $tags = $row["store_tag"];
        }
        $data_tags = explode(',', $tags);  // 數據裡的tag拆成array

        foreach ($store_tag_arr as $k2 => $v2) {
            // 刪除數據裡的tag
//            echo "v2=".$v2;

            if (in_array($v2, $data_tags)) {
                unset($data_tags[array_search($v2, $data_tags)]);  // 刪除不要的tag
//                var_dump($data_tags);  // 刪除後字串
            }
        }
        $save_tags = count($data_tags) === 0 ? "" : implode(",", $data_tags);  // 如果刪光了就存空字串  // array to string 與 explode 是一對

//        var_dump($save_tags);  // 刪除後字串
        $sql = "UPDATE store SET store_tag='{$save_tags}' WHERE id={$v};";
        if (!connect_mysql($sql)) echo 'fail';
    }

    echo 'success'; // 在店家新增那邊增加店家標籤，更新資料庫即可有新標籤
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
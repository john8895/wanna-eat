<?php

require_once 'dbh.inc.php';

class Order extends Connection
{
    public function postOrder()
    {
        $orderId = $_POST['orderId'];
        $orderName = $_POST['orderName'];
        $orderMeal = $_POST['orderMeal'];
        $orderPrice = $_POST['orderPrice'];
        $orderNumber = $_POST['orderNumber'];
        $orderRemark = $_POST['orderRemark'];
        $fieldId = uniqid();  // Unique field id

        $this->connect();
        $sql = "INSERT INTO orders (order_id, order_name, order_meal, order_price, order_number, order_remark, field_id) VALUES (:order_id, :order_name, :order_meal, :order_price, :order_number, :order_remark, :field_id)";
        $sth = $this->query($sql);
        $sth->execute(array(':order_id' => $orderId, ':order_name' => $orderName, ':order_meal' => $orderMeal, ':order_price' => $orderPrice, ':order_number' => $orderNumber, ':order_remark' => $orderRemark, ':field_id' => $fieldId));
        if ($this->hasError($sth)) echo 0;
        echo 1;
    }

    public function getOrders()
    {
        $conn = new connection();
        $orderAllSql = "SELECT * FROM orders";
        $sth = $conn->query($orderAllSql);
        $sth->execute();
        $result = $sth->fetchAll();

        print_r($result);
//        echo json_encode($result);  // 轉為json格式，轉譯處理中文
    }

    public function getOrderById($orderId): array
    {
        $this->connect();
        $sql = "SELECT * FROM orders WHERE order_id = :order_id";
        $sth = $this->query($sql);
        $sth->execute(array(':order_id' => $orderId));
        return $sth->fetchAll();
    }

    public function getFilterOrders()
    {
        $orderId = $_POST['order_id'];
        $new_item = $this->getOrderById($orderId);  // 取得指定訂單
        $meal_obj = array();
        foreach ($new_item as $k => $v) {
            $meal_obj[$v['order_meal']][] = $v;
        }

        $new_meal = array();
        $totalBuyer = array();
        $limit = 0;
        $temp_num = 0;

        foreach ($meal_obj as $k => $v) {
            if (count($v) > 1) {  // 有超過1筆
                foreach ($v as $item) {
                    $totalBuyer[] = $item['order_name'];
                    $temp_num += intval($item['order_number']);
                    $limit = 1;  // 標記
                }
            } else {
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
            $temp_num = 0;
        }
//    $order_json_data = json_encode($new_meal, JSON_UNESCAPED_UNICODE);  // 轉為json格式，轉譯處理中文
        $order_json_data = json_encode($new_meal);  // 轉為json格式，轉譯處理中文
        echo $order_json_data;
    }

    public function editOrder()
    {
        $order_id = $_POST['order_id'];
        $order_field_name = $_POST['order_field_name'];
        $order_field_value = $_POST['order_field_value'];
        $order_field_id = $_POST['field_id'];

        $this->connect();
        $sql = "UPDATE orders SET {$order_field_name}='{$order_field_value}' WHERE field_id=:order_field_id;";
        $sth = $this->query($sql);
        $sth->execute(array(':order_field_id' => $order_field_id));
        if ($this->hasError($sth)) echo 0;
        echo 1;
    }

    public function deleteOrder()
    {
        $field_id = $_POST['field_id'];
        $this->connect();
        $sql = "DELETE FROM orders WHERE field_id=:field_id;";
        $sth = $this->query($sql);
        $sth->execute(array(':field_id' => $field_id));
        if ($this->hasError($sth)) echo 0;
        echo 1;
    }

    // 繼續訂單
    public function continueOrder()
    {
        $orderId = $_POST['order_id'];
        $newTime = $_POST['new_time'];
        $this->connect();
        $sql = "UPDATE group_buy SET end_time=:newTime WHERE id=:orderId";
        $sth = $this->query($sql);
        $sth->execute(array(':newTime' => $newTime, ':orderId' => $orderId));
        if ($this->hasError($sth)) echo 0;
        echo 1;
    }

    // 關閉訂單
    public function closeOrder()
    {
        $endTime = $_POST['end_time'];
        $orderId = $_POST['order_id'];
        $this->connect();
        $sql = "UPDATE group_buy SET end_time=:endTime WHERE id=:orderId";
        $sth = $this->query($sql);
        $sth->execute(array(':endTime' => $endTime, ':orderId' => $orderId));
        if ($this->hasError($sth)) echo 0;
        echo 1;
    }

    // 新增評價
    public function postRating()
    {
        $nowDate = date("Y-m-d H:i:s");  // ex: 2020-07-04 18:21:00

        $rating['userId'] = $_POST['userId'];
        $rating['storeId'] = $_POST['storeId'];
        $rating['date'] = $nowDate;
        $rating['score'] = $_POST['score'];
        $rating['comment'] = $_POST['comment'];

        $this->connect();
        $sql = "INSERT INTO store_rating(`user_id`,`store_id`,`rating_date`,`rating_score`,`rating_comment`)VALUES(:userId,:storeId,:ratingDate,:ratingScore,:ratingComment)";
        $sth = $this->query($sql);
        $sth->execute(array(':userId' => $rating['userId'], ':storeId' => $rating['storeId'], ':ratingDate' => $rating['date'], ':ratingScore' => $rating['score'] , ':ratingComment' => $rating['comment']));
        if($this->hasError($sth)) echo 0;
        echo 1;
    }
}
//$nowDate = date("Y-m-d H:i:s");
//echo $nowDate;

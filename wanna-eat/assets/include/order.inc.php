<?php

class Order
{
    private $order_id = 0;
    private $order_name = '';
    private $order_meal = '';
    private $order_price = 0;
    private $order_number = '';
    private $order_remark = '';
    private $field_id = 0;

    public function __construct($method)
    {
        if ($method === 'postOrder') {
            $this->order_id = $_POST['order_id'];
            $this->order_name = $_POST['order_name'];
            $this->order_meal = $_POST['order_meal'];
            $this->order_price = $_POST['order_price'];
            $this->order_number = $_POST['order_number'];
            $this->order_remark = $_POST['order_remark'];
            $this->field_id = uniqid();  // Unique field id
        }
    }

    public function postOrder()
    {
        $sql = "INSERT INTO orders (order_id, order_name, order_meal, order_price, order_number, order_remark, field_id) VALUES ({$this->order_id}, '{$this->order_name}', '{$this->order_meal}', {$this->order_price}, {$this->order_number}, '{$this->order_remark}', '{$this->field_id}')";
        connect_mysql($sql);
        echo 'success';
    }

    public function getOrders()
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

    public function editOrder()
    {
        $this->order_id = $_POST['order_id'];
        $order_field_name = $_POST['order_field_name'];
        $order_field_value = $_POST['order_field_value'];
        $order_field_id = $_POST['field_id'];

        $sql = "UPDATE orders SET {$order_field_name}='{$order_field_value}' WHERE field_id='{$order_field_id}';";
        connect_mysql($sql);
        echo 'success';
    }
//    public function linePostOrder($orderName): string
//    {
//        $this->order_id = '210810065103';
//        $this->order_name = $orderName;
//        $this->order_meal = '';
//        $this->order_price = '';
////        $this->order_meal = $_POST['order_meal'];
////        $this->order_price = $_POST['order_price'];
//        $this->order_number = 1;
//        $this->order_remark = '';
//        $this->field_id = uniqid();  // Unique field id
////        $sql = "INSERT INTO orders (order_id, order_name, order_meal, order_price, order_number, order_remark, field_id) VALUES ({$this->order_id}, '{$this->order_name}', '{$this->order_meal}', {$this->order_price}, {$this->order_number}, '{$this->order_remark}', '{$this->field_id}')";
////        connect_mysql($sql);
//        return 'success';
////        return $sql;
//    }
}
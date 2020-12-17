<?php
require_once './assets/inc/connect.php';
orderTotal(200709062654);
function orderTotal($order_id)
{
    $sql = "SELECT * FROM orders WHERE order_id={$order_id};";
    $result = connect_mysql($sql);
    $new_item = [];
    while ($item = $result->fetch_assoc()) {
        $new_item[] = $item;
    }

    $meal_obj = [];
    foreach ($new_item as $k => $v) {
        $meal_obj[$v['order_meal']][] = $v;
    }

    $meal = [];
    $totalBuyer = [];
    $totalNumber = 0;
    $temp_num = 0;
    $limit = 0;
    foreach ($meal_obj as $k => $v) {
        if (count($v) > 1) {
            // 有超過1筆
            foreach ($v as $item) {
                $totalBuyer[] = $item['order_name'];
                $totalNumber++;
                $temp_num += intval($item['order_number']);
                var_dump($item, intval($item['order_number']));
                $limit = 1;  // 標記
            }
        } else {
            $totalNumber++;
            var_dump($v[0]['order_number']);
//            $temp_num = (int)$item['order_number'];
        }
        $meal['order_meal'][] = [
            "meal" => $k,
            "price" => (int)$v[0]['order_price'],
            "order_number" => $temp_num,
            "totalBuyer" => count($v),
            "subTotal" => (int)($v[0]['order_price'] * $totalNumber),
            "buyerName" => $limit !== 1 ? $v[0]['order_name'] : join(',', $totalBuyer),  // '阿貓,媽媽米,一原'
        ];
        $totalBuyer = [];  // 清空array
        $limit = 0;  // 清除標記
        $totalNumber = 0;
        $temp_num = 0;
    }
}
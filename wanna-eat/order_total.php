<?php
require_once './assets/inc/connect.php';
orderTotal(200709062654);
function orderTotal($order_id)
{
    $sql = "SELECT * FROM orders WHERE order_id={$order_id};";
    $result = connect_mysql($sql);
    /*
    * 1. 總金額  yes
    * 2. 總人數  yes
    * 3. 訂購餐點 -> 不重複 array_unique  *
    * 4. 價錢 -> 價錢 * 數量 = 小計
    * 5. 訂購人 ->
    * 結果：排骨飯 50 * 2 = 100  | 阿熊、阿貓、阿翰
    */
    $new_item = [];
//    $i = 0;
//    $meal_obj = [];
//    $temp_meal = '';
    while ($item = $result->fetch_assoc()) {
        $new_item[] = $item;
//        var_dump($item);
//        if (in_array('排餐', $item)) {
//            echo $i . '有一樣';
//        }
//        $i++;
    }
    $i = 0;
    $temp = '';
    $meal_obj = [];
    foreach ($new_item as $k => $v) {

        $meal_obj[$i] = $v['order_meal'];

//        var_dump($v['order_meal']);
////        var_dump(in_array($temp, $v));
//        $temp = $v['order_meal'];
//        echo $i . '=';
//        if(in_array($temp, $v)){
//            echo $temp . '一樣 ';
////            var_dump('$temp',$temp);
//            $meal_obj['order_meal'] = $temp;
//            $temp = '';
//        }else{
//            echo $v['order_meal'] . ' ';
//            $temp = $v['order_meal'];
//        }
        $i++;
    }

    $meal_count = array_count_values($meal_obj);  // 餐點總數 不重複
    $meal_all = [];
    $meal_i = 0;
    foreach ($meal_count as $k => $v) {
        echo $k . '共有 ' . $v . " 個\n";
        if(in_array($k, $new_item[$meal_i])){
            echo '$k:', $k;
            var_dump($new_item[$meal_i]);
            $meal_all['order_meal'] = $k;
            $meal_all['order_price'] = (int)$new_item[$meal_i]['order_price'];
        }
        $meal_i++;
    }


    var_dump($meal_count);

    var_dump('$new_item', $new_item);
    var_dump('$meal_obj', $meal_obj);
    var_dump('$meal_all', $meal_all);
    echo '--------------------------------';
    echo "<br>";
    echo '--------------------------------';
}


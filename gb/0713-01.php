<?php
// 從資料庫取出的資料
$data = array(
    0 => array(
        "order_id" => 200709062654,
        "order_name" => "阿貓",
        "field_id" => "5f06489ed8277",
        "order_meal" => "排餐",
        "order_price" => 100,
        "order_number" => 1,
        "order_remark" => ""),
    1 => array(
        "order_id" => 200709062654,
        "order_name" => "媽媽米",
        "field_id" => "5f0648a863867",
        "order_meal" => "排餐",
        "order_price" => 100,
        "order_number" => 1,
        "order_remark" => 1
    ),
    2 => array(
        "order_id" => 200709062654,
        "order_name" => "阿翰",
        "field_id" => "5f06effb1d87d",
        "order_meal" => "雞排飯",
        "order_price" => 125,
        "order_number" => 1,
        "order_remark" => "排骨大辣 炒飯不辣"
    )
);
// 想要得到的結果：
//    排餐 100 * 2 = 200  訂購人：阿貓、媽媽米
//    雞排飯 125 * 1 = 100  訂購人：阿翰

// 2020.07.13 明澤教的解法
$data1=[];
foreach ($data as $k => $v) {
    $data1[$v['order_meal']][] = $v;  // 用餐點名做 key，訂單含同名餐點就會自動集中在array中
}

foreach ($data1 as $k => $item){
//    var_dump($k, $v);
//    echo $k ;
    if(count($item) > 1){  // 有兩個人以上訂相同餐點
        var_dump($k, count($item));
    }
//    var_dump($k, $v[0]);
    foreach ($item as $v){

        // 取得單一餐點中的其他資訊
        var_dump($v['order_price']);
        var_dump($v['order_name']);
        var_dump($v['order_number']);
    }
}


//print_r($data1);



//print_r($data);
/*
    * 1. 總金額  yes
    * 2. 總人數  yes
    * 3. 訂購餐點 -> 不重複 array_unique  *
    * 4. 價錢 -> 價錢 * 數量 = 小計
    * 5. 訂購人 ->
    * 結果：排骨飯 50 * 2 = 100  | 阿熊、阿貓、阿翰
    */

$temp = [];
foreach ($data as $k => $v) {
    $temp[$k] = $v['order_meal'];
}
$count_array = array_count_values($temp);
//var_dump($count_array);
/*
 array (size=2)
  '排餐' => int 2
  '雞排飯' => int 1
 */


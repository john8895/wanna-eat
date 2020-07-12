<?php

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
print_r($data);

$temp = [];
foreach ($data as $k => $v) {
    $temp[$k] = $v['order_meal'];
}
$count_array = array_count_values($temp);
var_dump($count_array);
/*
 array (size=2)
  '排餐' => int 2
  '雞排飯' => int 1
 */


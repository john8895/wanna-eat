<?php


// 提取數據供前端取用
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $store = [
        "name" => "龍皮魚丸店",
        "phone" => "04-12345678"
    ];
//    foreach ($store as $key=>$value){
//       $new_array[urlencode($key)] = urlencode($value);
//    }
    // 編譯為 JSON
    $data_json = json_encode($store, JSON_UNESCAPED_UNICODE);
    echo $data_json;  // 最後 echo 出去，前端即可得到
}


// 接收前端傳入的數據
if($_SERVER['REQUEST_METHOD']==='POST'){
//    echo 'POST success';
    print_r($_POST);
}
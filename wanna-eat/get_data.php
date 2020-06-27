<?php

/**
 * 後端傳送數據
 */
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $store = [
        "name" => "龍皮魚丸店",
        "phone" => "04-123456"
    ];
    $json_data = json_encode($store, JSON_UNESCAPED_UNICODE);
    echo $json_data;
}
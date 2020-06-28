<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    get_data();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'POST';
}


function get_data()
{
    $mysqli = new mysqli("localhost", "apai01", "maze0819", "wannaeat");
    if ($mysqli->connect_errno) exit('<h1>讀取數據庫失敗</h1>');
    if (!$result = $mysqli->query('SELECT * FROM store')) exit('<h1>讀取數據失敗</h1>');

    $new_item = array();
    while ($item = $result->fetch_assoc()) {
        $new_item[] = $item;
    }
    $json_data = json_encode($new_item, JSON_UNESCAPED_UNICODE);  // 轉為json格式，轉譯處理中文
    echo $json_data;
    $result->close();
}



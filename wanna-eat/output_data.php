<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//    echo 'Hello';
    get_data();
}

function get_data()
{
    $mysqli = new mysqli("localhost", "apai01", "maze0819", "wannaeat");
    if ($mysqli->connect_errno) exit('<h1>讀取數據庫失敗</h1>');
    if (!$result = $mysqli->query('SELECT * FROM store')) exit('<h1>讀取數據失敗</h1>');

    $new_item = array();
    while ($item = $result->fetch_assoc()) {
//        var_dump($item);
        $new_item[] = $item;
    }
//    var_dump($new_item);

    $json_data = json_encode($new_item, JSON_UNESCAPED_UNICODE);
    echo $json_data;
    $result->close();
}



/*
 * ======================
 * mysql
 * ======================
 */

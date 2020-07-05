<?php
/* filename: connect.php */
require_once 'config.php';

function connect_mysql($sql){
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if($conn->connect_error) exit('<h1>數據庫讀取失敗</h1>');
    mysqli_set_charset($conn, 'utf8');

    if(!$result = $conn -> query($sql)) exit('<h1>操作數據庫失敗</h1>');
    $conn->close();
    return $result;
}
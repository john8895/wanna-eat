<?php
/* filename: connect.php */

function connect_mysql($sql){
    $conn = new mysqli('localhost','apai01','maze0819','wannaeat');
    if($conn->connect_error) exit('<h1>數據庫讀取失敗</h1>');
    mysqli_set_charset($conn, 'utf8');
    if(!$result = $conn -> query($sql)) exit('<h1>操作數據庫失敗</h1>');
    $conn->close();
    return $result;
}
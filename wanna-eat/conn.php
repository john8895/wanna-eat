<?php

function mysql_func($sql){
    $connection = mysqli_connect('127.0.0.1', 'apai01', 'maze0819', 'wannaeat');
    if (!$connection) exit('<h1>連接數據庫失敗</h1>');
    $query = mysqli_query($connection, $sql);
    if (!$query) exit('<h1>查詢數據失敗</h1>');
    return $query;
}
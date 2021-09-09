<?php
require_once 'config.php';

function connect_mysql($sql)
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) exit('<h1>Database read failure</h1>');
    mysqli_set_charset($conn, 'utf8');

    if (!$result = $conn->query($sql)) exit('<h1>Operation database failed</h1>');
    $conn->close();
    return $result;
}
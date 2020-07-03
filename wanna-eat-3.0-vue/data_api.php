<?php

/** GET */
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    get_data();
}

/** POST */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 取得 post 過來的數據存成string，不能用$_POST
    // $_POST 只能取得 Content-type 為 application/x-www-form-urlencoded 或 multipart/form-data 的資料
    if (!$json_data = file_get_contents("php://input")) exit();

    post_data($json_data);
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


function post_data($json_data)
{
    $data = json_decode($json_data, true);

    $json_en_data = json_encode($data['orders'], JSON_UNESCAPED_UNICODE);
    $sql = "INSERT INTO orders (id, store_name, store_phone, user_orders) VALUES (null, '{$data['store']['name']}', '{$data['store']['phone']}', '{$json_en_data}')";
//    print_r($sql);

    // Create connection
    $conn = new mysqli('localhost', 'apai01', 'maze0819', 'wannaeat');
    // Check connection
    if ($conn->connect_error) exit('<h1>讀取數據庫失敗</h1>');

    if (!$result = $conn->query($sql)) exit('<h1>寫入數據失敗</h1>');
    $conn->close();
    echo '數據寫入成功';
}
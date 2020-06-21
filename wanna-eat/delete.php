<?php
/* filename: edit.php */
if($_SERVER['REQUEST_METHOD']==='GET' && !empty($_GET)){
    delete_user();
}else{
    exit('<h1>需傳入參數</h1>');
}

function delete_user(){
    $delete_id = $_GET['id'];

    $conn = mysqli_connect('127.0.0.1','apai01','maze0819','wannaeat');
    if(!$conn) exit('<h1>連接數據庫失敗</h1>');

    $query = mysqli_query($conn, "DELETE FROM store WHERE id = {$delete_id};");
    if(!$query) exit('<h1>刪除數據失敗</h1>');

    header('Location: index.php');
}
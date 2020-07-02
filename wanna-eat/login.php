<?php
/* filename: login.php */
require_once("../libs/Smarty.class.php");
require_once("./assets/inc/connect.php");
$smarty = new Smarty;

if(!isset($logged)){
    $logged = false;
    $smarty->assign('logged', $logged);
}
//var_dump($logged);

global $error_message;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $smarty->assign('username', $_POST['username']);
    $smarty->assign('password', $_POST['password']);

    if (empty($_POST['username'])) {
        $GLOBALS['error_message'] = '請輸入帳號';
    }
    if (empty($_POST['password'])) {
        $GLOBALS['error_message'] = '請輸入密碼';
    }

    // 校驗帳號與密碼是否正確
    $users['username'] = $_POST['username'];
    $users['password'] = $_POST['password'];

    $conn = mysqli_connect('127.0.0.1', 'apai01', 'maze0819', 'wannaeat');
    if (!$conn) {
        $GLOBALS['error_message'] = '無法連接數據庫';
    }
    $result1 = mysqli_query($conn, "SELECT username, password FROM users WHERE username = '{$users['username']}' AND password = '{$users['password']}'");

    // 如帳號密碼都正確，設置SESSION並跳轉頁面
    if (mysqli_affected_rows($conn) > 0) {
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['name'] = $users['username'];
        header('Location: index.php');
    }else{
        $GLOBALS['error_message'] = '帳號或密碼錯誤';
    }
}


if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->display("./templates/login.tpl");
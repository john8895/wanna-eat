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


//session_start();
//if(!empty($_POST["login"])) {
//    $conn = mysqli_connect("localhost", "root", "", "blog_samples");
//    $sql = "Select * from members where member_name = '" . $_POST["member_name"] . "'";
//    if(!isset($_COOKIE["member_login"])) {
//        $sql .= " AND member_password = '" . md5($_POST["member_password"]) . "'";
//    }
//    $result = mysqli_query($conn,$sql);
//    $user = mysqli_fetch_array($result);
//    if($user) {
//        $_SESSION["member_id"] = $user["member_id"];
//
//        if(!empty($_POST["remember"])) {
//            setcookie ("member_login",$_POST["member_name"],time()+ (10 * 365 * 24 * 60 * 60));
//        } else {
//            if(isset($_COOKIE["member_login"])) {
//                setcookie ("member_login","");
//            }
//        }
//    } else {
//        $message = "Invalid Login";
//    }



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

    $sql = "SELECT username, password FROM users WHERE username = '{$users['username']}' AND password = '{$users['password']}'";
    $result1 = connect_mysql($sql);

    // 如帳號密碼都正確，設置SESSION並跳轉頁面
    if ($result1->num_rows > 0) {
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['name'] = $users['username'];

//        if(!empty($_POST["remember_me"])) {  // is checked
//            setcookie ("member_login",$_POST["member_name"],time()+ (10 * 365 * 24 * 60 * 60));
//        } else {
//            if(isset($_COOKIE["member_login"])) {
//                setcookie ("member_login","");
//            }
//        }

        header('Location: index.php');
    }else{
        $GLOBALS['error_message'] = '帳號或密碼錯誤';
    }
}

if (isset($_COOKIE['member_login'])) $smarty->assign('member_login', '1');

if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->display("./templates/login.tpl");
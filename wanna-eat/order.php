<?php
require_once("../libs/Smarty.class.php");
global $smarty;
$smarty = new Smarty;

// 用SESSION判斷是否有登入，如果沒登入就跳轉頁面
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']===true){
    echo '您已登入';
    $logged = true;
}else{
    $logged = false;
//    header('Location: index.php');
}
var_dump($logged);
$smarty->assign('logged', $logged);



if($_SERVER['REQUEST_METHOD']==='GET'){
    $id = $_GET['id'];
    $smarty->assign('id', $id);
}







if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->display("./templates/order.tpl");
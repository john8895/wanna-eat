<?php
/* filename: login.php */

require_once("../libs/Smarty.class.php");
//global $smarty;
$smarty = new Smarty;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(empty($_POST['username']) || isset($_POST['username'])){
        $GLOBALS['error_message']='請輸入帳號';
        return;
    }
    if(empty($_POST['password'])){
        $GLOBALS['error_message']='請輸入密碼';
        return;
    }
    echo 'OK';

}
//if(isset($error_message)){
//    $smarty->assign('error', $error_message);
//}

$smarty->display("./templates/login.tpl");

<?php
require_once("../libs/Smarty.class.php");
require_once("./assets/inc/connect.php");
$smarty = new Smarty;

if(!isset($logged)){
    $logged = false;
    $smarty->assign('logged', $logged);
}
global $error_message;

if (isset($_COOKIE['member_login'])) $smarty->assign('member_login', '1');

if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->display("./templates/register-group.tpl");
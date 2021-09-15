<?php
require_once("../libs/Smarty.class.php");
require_once './assets/inc/connect.php';
require_once './assets/include/store.inc.php';

global $smarty;
$smarty = new Smarty;

require_once './assets/inc/check-login-inner.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $smarty->assign('name', $_POST['name']);
    $smarty->assign('phone', $_POST['phone']);
//    $addStore = new Store();
//    $addStore->add();
}

if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->display("./templates/add.tpl");
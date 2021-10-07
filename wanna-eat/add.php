<?php
require_once("../libs/Smarty.class.php");
require_once './assets/inc/connect.php';
require_once './assets/include/store.inc.php';

global $smarty;
$smarty = new Smarty;

require_once './assets/inc/check-login-inner.php';

if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->display("./templates/add.tpl");
<?php
/* filename: group-buy-now.php */
require_once("../libs/Smarty.class.php");
require_once './assets/inc/connect.php';  // Connect Mysql
global $smarty;
$smarty = new Smarty;
require_once './assets/inc/check-login-inner.php';  // Check Login Status


if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->display("./templates/edit-group-buy.tpl");
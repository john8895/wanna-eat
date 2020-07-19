<?php
require_once("../libs/Smarty.class.php");
/** Connect Mysql */
require_once './assets/inc/connect.php';

global $smarty;
$smarty = new Smarty;

/** Check Login Status */
require_once './assets/inc/check-login-inner.php';


if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->display("./templates/edit-info.tpl");
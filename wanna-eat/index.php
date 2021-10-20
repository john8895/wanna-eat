<?php
require '../libs/Smarty.class.php';
/** Connect Mysql */
require_once './assets/inc/connect.php';
//require_once './assets/include/store.inc.php';
//require_once './assets/include/groupbuy.inc.php';

$smarty = new Smarty;
$smarty->setTemplateDir('./templates/');

/** Check Login Status */
require_once './assets/inc/check-login.php';

//$getStore = new store();
//$smarty->assign('stores', $getStore->index());
$smarty->display('layout.tpl');
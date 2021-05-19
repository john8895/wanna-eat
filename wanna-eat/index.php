<?php
require '../libs/Smarty.class.php';
require_once './assets/includes/store-inc.php';

$smarty = new Smarty;
$smarty->setTemplateDir('./templates/');

/** Check Login Status */
require_once './assets/inc/check-login.php';

$stores = new Store();
$smarty->assign('stores', $stores->getStore());
$smarty->display('layout.tpl');
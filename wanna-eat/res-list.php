<?php
require '../libs/Smarty.class.php';
/** Connect Mysql */
require_once './assets/inc/connect.php';

$smarty = new Smarty;

/** Check Login Status */
//require_once './assets/inc/check-login.php';


$sql = 'SELECT * FROM store';
$result = connect_mysql($sql);

$stores = array();
while ($rows = mysqli_fetch_assoc($result)) {
    $stores[] = $rows;
}

$smarty->assign('stores', $stores);
$smarty->display('res-list.tpl');
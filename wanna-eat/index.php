<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require '../libs/Smarty.class.php';
$smarty = new Smarty;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->setTemplateDir('./templates/');

/*
 * ======================
 * Logged in
 * ======================
 */
session_start();
if(isset($_SESSION['logged_in'])){
    echo '您已登入';
    $logged = true;
}else{
    $logged = false;
}


/*
 * ======================
 * mysql
 * ======================
 */
$connection = mysqli_connect('127.0.0.1', 'apai01', 'maze0819', 'wannaeat');
if (!$connection) exit('<h1>連接數據庫失敗</h1>');

$query = mysqli_query($connection, 'SELECT * FROM store');
if (!$query) exit('<h1>查詢數據失敗</h1>');

$stores = array();
while ($rows = mysqli_fetch_assoc($query)) {
    $stores[] = $rows;
}


$smarty->assign('logged', $logged);
$smarty->assign('stores', $stores);
$smarty->display('layout.tpl');
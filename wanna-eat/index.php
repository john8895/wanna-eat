<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require '../libs/Smarty.class.php';
require_once 'conn.php';

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
var_dump($logged);
$smarty->assign('logged', $logged);


/*
 * ======================
 * mysql
 * ======================
 */
$result = mysql_func('SELECT * FROM store');
if(!isset($result)) exit('error');

$stores = array();
while ($rows = mysqli_fetch_assoc($result)) {
    $stores[] = $rows;
}

$smarty->assign('stores', $stores);
$smarty->display('layout.tpl');
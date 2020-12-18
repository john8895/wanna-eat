<?php
/** Check Login Status */
session_start();
if(isset($_SESSION['logged_in'])){
//    echo $_SESSION['name'] . ' 您已登入';
    $logged = true;
}else{
    $logged = false;
//    header('Location: index.php');
}
//var_dump($logged);
$smarty->assign('logged_name', isset($_SESSION['name']));
$smarty->assign('logged', $logged);
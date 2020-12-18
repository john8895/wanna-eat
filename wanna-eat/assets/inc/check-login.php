<?php
/** Check Login Status */
session_start();
if(isset($_SESSION['logged_in'])){
//    echo $_SESSION['name'] . ' 您已登入';
    $logged = true;
    $smarty->assign('logged_name', $_SESSION['name']);
}else{
    $logged = false;
//    header('Location: login.php');
}
//var_dump($logged);
$smarty->assign('logged', $logged);
<?php

require_once './assets/includes/store-inc.php';

if($_SERVER['REQUEST_METHOD']==='GET' && !empty($_GET)){
    $deleteStore = new Store($_GET['id']);
    echo $deleteStore->deleteStore();
//    header('Location: index.php');
//    echo 'success';
}else{
//    header('Location: index.php');
    echo 'error';
}
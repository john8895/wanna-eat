<?php

require_once './assets/includes/store-inc.php';

if($_SERVER['REQUEST_METHOD']==='GET' && !empty($_GET)){
    $deleteStore = new Store($_GET['id']);
    $deleteStore->deleteStore();
    header('Location: index.php');
}else{
    header('Location: index.php');
}
<?php
/** Connect Mysql */
require_once './assets/inc/connect.php';
require_once './assets/include/user.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
    $delete_user = new User();
    $delete_user->delete();
} else {
    header('Location: index.php');
}
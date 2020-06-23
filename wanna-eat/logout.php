<?php
session_start();
session_destroy();
unset($_SESSION['logged_in']);
echo '您已登出';
var_dump($_SESSION);
header('Location: index.php');
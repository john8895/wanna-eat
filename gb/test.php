<?php
//session_start();
//$_SESSION['login'] = 'yes';

setcookie('key', 'value1', time() + 1 * 24 * 60 * 60, '');

echo time() * 60 * 60 * 24;
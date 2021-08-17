<?php
$log = "123";
$logDir = '/log/';
//if(!is_dir($logDir)) {
//    mkdir($logDir);
//}
file_put_contents('lineBot_log.txt', $log);
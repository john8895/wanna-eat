<?php
// Localhost
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'wannaeat');
define('DB_USER', 'apai01');
define('DB_PASSWORD', '123456');

// Remote Server
//define('DB_HOST', 's-cdbr-east-02.cleardb.com');
//define('DB_NAME', 'heroku_a1d5f5db83503a4');
//define('DB_USER', 'b526cf82710b1f');
//define('DB_PASSWORD', '54af1c19');

// 時區 - 如未設定從mysql讀出的中文數據會變亂碼
date_default_timezone_set("Asia/Taipei");

define('HTTP_HOST', $_SERVER['HTTP_HOST']);
define('SERVER_ROOT_PATH', dirname(dirname(__FILE__) . '/wanna-eat'));

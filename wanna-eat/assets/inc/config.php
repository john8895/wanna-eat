<?php
// Localhost
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'wannaeat');
define('DB_USER', 'apai01');
define('DB_PASSWORD', 'maze0819');

// Remote Server
//define('DB_HOST', 'localhost');
//define('DB_NAME', 'ediso_wannaeat');
//define('DB_USER', 'ediso_apai01');
//define('DB_PASSWORD', 'maze0819');

// 時區 - 如未設定從mysql讀出的中文數據會變亂碼
date_default_timezone_set("Asia/Taipei");
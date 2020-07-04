<?php

// time() -> 當前的時間與 Unix 紀元（西元1970年1月1日00:00:00）的時間差用秒數來表示
$WeekSeconds = time() + (24 * 60 * 60 * 7); //24小時x60分x60秒x7天
//$t = date('Ymd');
//echo date('Y-m-d', $WeekSeconds);
//echo $t;

// 要設定時區 時間才是正確的
date_default_timezone_set("Asia/Taipei");
$nowTime =  date('ymd H:i:s', time());  // 取得現在年月日 時分秒
$subject = '200704 14:15:02';
$patten = '/\s|:/';
$r = preg_replace($patten, '', $nowTime);
//echo $r;

$nowTime2 =  date('H-i', time());  // 取得現在年月日 時分秒
//echo $nowTime2;
//echo '<br>';
echo date('H-i', strtotime("+10 minute")) . "<br>";  // 取得當前分鐘 + 10分
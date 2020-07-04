<?php
$subject = '23-24';
$date_pattern = '/\b[0-1][0-9]-[0-3][0-9]/';
$time_pattern = '/^([0-1][0-9]|2[0-3])-[0-5][0-9]$/';
//$pattern = '/\d{2}-\d{2}/';
$r = preg_match($time_pattern, $subject);
echo $r;
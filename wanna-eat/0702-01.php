<?php
$subject = '07-2';
$pattern = '/\d{2}-\d{2}/';
$reg = preg_match($pattern, $subject);
var_dump($reg);
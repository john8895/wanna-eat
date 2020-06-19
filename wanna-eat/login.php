<?php
/* filename: login.php */

require_once ("../libs/Smarty.class.php");
$smarty = new Smarty;
$smarty->display("./templates/login.tpl");
<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require '../libs/Smarty.class.php';
//$smarty = new Smarty;

$index_template = new Smarty;
$index_template->debugging = false;
$index_template->caching = false;
$index_template->setTemplateDir('./templates/');





// mysql

$connection = mysqli_connect('127.0.0.1', 'apai01','maze0819','wannaeat');
if(!$connection) exit('<h1>連接數據庫失敗</h1>');

$query = mysqli_query($connection, 'SELECT * FROM store LIMIT 10');
if(!$query) exit('<h1>查詢數據失敗</h1>');

var_dump($query);










//$index_template->assign("posts", $post);
//$index_template->assign("title", $home_title);//from header.php
//$index_template->assign("description", $output_cities);//from header.php
$index_template->display('layout.tpl');

//$smarty->force_compile = true;
//$smarty->debugging = true;
//$smarty->caching = true;
//$smarty->cache_lifetime = 120;
//$smarty->assign("Name", "Fred Irving Johnathan Bradley Peppergill", true);
//$smarty->assign("FirstName", array("John", "Mary", "James", "Henry"));
//$smarty->assign("LastName", array("Doe", "Smith", "Johnson", "Case"));
//
//$smarty->assign('john','Hello World!');
//
//
//$smarty->assign(
//    "Class",
//    array(
//        array("A", "B", "C", "D"),
//        array("E", "F", "G", "H"),
//        array("I", "J", "K", "L"),
//        array("M", "N", "O", "P")
//    )
//);
//$smarty->assign(
//    "contacts",
//    array(
//        array("phone" => "1", "fax" => "2", "cell" => "3"),
//        array("phone" => "555-4444", "fax" => "555-3333", "cell" => "760-1234")
//    )
//);
//$smarty->assign("option_values", array("NY", "NE", "KS", "IA", "OK", "TX"));
//$smarty->assign("option_output", array("New York", "Nebraska", "Kansas", "Iowa", "Oklahoma", "Texas"));
//$smarty->assign("option_selected", "NE");
//$smarty->display('./templates/layout.tpl');

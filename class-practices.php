<?php

//class my_class
//{
//    var $username = "哈囉";
//
//    function show_username($username)
//    {
//        echo $this->username;
//    }
//}
//
//$Name = new my_class();
//
//$Name->username;

//$Name->show_username("Hi");


class Config {
    private $file_path = "./public/assets/";

    public function getFilePath(){
        return $this->file_path;
    }
}

$header = new Config();
$header->file_path;

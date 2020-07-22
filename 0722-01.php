<?php

//class Person
//{
//
//    public $name;
//    public $age;
//    public $say;
//
//    function sayHi($name)
//    {
//        $this->name = $name;
//        return $this->name;
//    }
//}
//
//$obj1 = new Person();
//echo $obj1->sayHi('John');

class demo {
    public $hello = 'Hello World';

    function hello(){
        echo $this->hello;
    }
}
$demo = new demo();
$demo->hello();
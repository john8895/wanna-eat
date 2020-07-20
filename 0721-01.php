<?php

class NewClass
{

    public $info = 'This is some info';
    private $info2 = 'This is a private';

    function sum($a, $b)
    {
        return $a + $b;
    }

}

$object = new NewClass();
var_dump($object->sum(3,4));
<?php

class Person{
    public $name;
    public $eyeColor;
    public $age;

    public function __construct($name, $eyeColor, $age)
    {
        $this->name = $name;
        $this->eyeColor = $eyeColor;
        $this->age = $age;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
}

$var = new Person('John', 'Blue', 28);
echo $var->getName();
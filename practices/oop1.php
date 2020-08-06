<?php

class Myclass
{
    public $prop1 = 'I am here';

    public function __construct()
    {
        echo 'The class"', __CLASS__,'" was initiated!<br>';
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo 'The class"', __CLASS__,'" was destroyed!<br>';

    }

    public function __toString()
    {
        echo 'Using the toString method: ';
        return $this->getProperty();
    }

    public function setProperty($newval)
    {
        $this->prop1 = $newval;
    }

    public function getProperty()
    {
        return $this->prop1 . "<br>";
    }
}

class MyOtherClass extends Myclass
{
    public function newMethod()
    {
        echo 'From a new method in ' . __CLASS__ . "<br>";
    }
}


//$obj = new Myclass();

//echo $obj->getProperty();
//
//unset($obj);
//
//echo 'End of file.<br>';

//echo $obj;

$newobj = new MyOtherClass();
echo $newobj->newMethod();


echo $newobj->getProperty();
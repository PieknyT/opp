<?php
class Person
{
    private $name;
    private $age;
    private $id;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function __destruct()
    {
        if(!empty($this->id))
        {
            //utrwalanie obiektu w bazie
            print "Object data saved in the database, like a Person $this->id;";
        }
    }
}


$test = new Person("Tomas", "33");
$test->setId(1);
unset($test);

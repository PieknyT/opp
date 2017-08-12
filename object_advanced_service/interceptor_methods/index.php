<?php
class Person
{
    private $lastName;
    private $city;

    function __get($property)
    {
        $method = "get$property";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
        else
        {
            echo "wrong way";
        }

    }

    function __set($property, $value)
    {
        $method = "set$property";
        if(method_exists($this, $method))
        {
            return $this->$method($value);
        }
    }

    function __isset($property)
    {
        $method = "get$property";
        return method_exists($this, $method); //check getter for variable exist
    }

    function __unset($property)
    {
        $method = "set$property";
        if(method_exists($this, $method))
        {
            $this->$method("unset - property");
            $this->$method(null);
        }
    }

    function getName()
    {
        return "Bob";
    }

    function getAge()
    {
        return 44;
    }

    function getLastName()
    {
        return $this->lastName;
    }

    function getCity()
    {
        return$this->city;
    }

    function setLastName($lastName)
    {
        $this->lastName = $lastName;
        if (! is_null($lastName))
        {
            $this->lastName = strtoupper($this->lastName);
        }
    }

    function setCity($city)
    {
        $this->city = strtoupper($city);
    }

}

$p = new Person();
//print $p->age;
//if (isset($p->name))
//{
//    print $p->name;
//}

$p->lastName = "nawrocki";

$p->city = "Varsavia";

echo $p->lastname; echo "<br>";

echo $p->city;     echo "<br>";
unset($p->LastName);

echo $p->lastname;

                  echo "<br>";


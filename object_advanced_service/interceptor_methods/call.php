<?php
// funkcja call - delegowanie wywołań


class PersonWriter
{
    function writeName(Person $p)
    {
        echo $p->getName()."\n";
    }

    function writeAge(Person $p)
    {
        print $p->getAge()."\n";
    }
}

class Person
{
    private $writer;

    function __construct(PersonWriter $writer)
    {
        $this->writer = $writer;
    }

    function __call($methodName, $arguments)
    {
        if(method_exists($this->writer, $methodName))
        {
            return $this->writer->$methodName($this);
        }
    }

    function getName() {return "Bob";}
    function getAge() {return "44";}
}


$person = new Person(new PersonWriter());

$person->writeName();
$person->writeAge();

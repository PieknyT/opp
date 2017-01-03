<?php
// Metoda konstrukcji obiektu
class ShopProduct
{
    public $title            = "bez tytułu";
    public $producerMainName  = "nazwisko";
    public $producerFirstName = "imię";
    public $price            = 0;

    function getProducer()
    {
        return "{$this->producerFirstName} ".
               "{$this->producerMainName}";
    }

    function __construct($title, $firstName, $mainName, $price)
    {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
    }
}

$product1 = new ShopProduct("Moja Antonina", "Willa", "Carter", 59.99);

print "Autor: {$product1->getProducer()}\n";





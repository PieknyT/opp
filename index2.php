<?php
// Metody
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
}

$product1 = new ShopProduct();
$product2 = new ShopProduct();

//print $product1->title;

$product1->title             = "Moja Antonina";
$product1->producerFirstName = "Willa";
$product1->producerMainName  = "Carter";
$product1->price             = 59.99;
$product1->arbitraryAddition = "nowość";

print "Autor: {$product1->getProducer()}\n";


$product2->title = "Paragraf 22";


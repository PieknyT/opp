<?php

class ShopProduct
{
    public $title            = "bez tytułu";
    public $producerMainName  = "nazwisko";
    public $producerFirstName = "imię";
    public $price            = 0;
}

$product1 = new ShopProduct();
$product2 = new ShopProduct();

//print $product1->title;

$product1->title               = "Moja Antonina";
$product1->producerFirstName    = "Willa";
$product1->producerMainName = "Carter";
$product1->price               = 59.99;
$product1->arbitraryAddition = "nowość";

print $product1->arbitraryAddition."\n";
print "Autor: {$product1->producerFirstName} "
              ."{$product1->producerMainName}\n";


$product2->title = "Paragraf 22";

//var_dump($product1);
//var_dump($product2);

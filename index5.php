<?php
// Typy obiektowe
//      is_object()
//      is_array()


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

class ShopProductWriter
{
    // sygnalizowanie użycia typu tablicowego jako argumentu wywołania
    public function write(ShopProduct $shopProduct)
    {
        $str =   "{$shopProduct->title}: "
                .$shopProduct->getProducer()
                ." ({$shopProduct->price})\n";
        print $str;
    }


    //sygnalizowanie tablicowego argumentu wywołania
    function setArray(array $storearray)
    {
        $this->array = $storearray;
    }

    // sygnalizowanie użycia typu tablicowego jako argumentu wywołania ewentualnie wartości pustej
    function setWrite(ObjectWriter $objwriter)
    {
        $this->writer = $objwriter;
    }


}

class Wrong{}

$product1 = new ShopProduct("Moja Antonina", "Willa", "Carter", 59.99);
$wrog = new Wrong();

$writer = new ShopProductWriter();
$writer->write($product1);
$writer->write($wrog);













<?php
// Dziedziczenie part 2 (stosowanie dziedzicenia)


class ShopProduct
{
    public $numPages;
    public $playLength;
    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $price;

    function __construct($title, $firstName, $mainName, $price, $numPages = 0, $playLength = 0)
    {
        $this->title             = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName  = $mainName;
        $this->price             = $price;
        $this->numPages          = $numPages;
        $this->playLength        = $playLength;
    }

    function getProducer()
    {
        return "{$this->producerFirstName} ".
               "{$this->producerMainName}";
    }

    function getSummaryLine()
    {
        $base = "{$this->title} ({$this->producerMainName}, ";
        $base.= "{$this->producerFirstName} )";
        return $base;
    }

}

class CdProduct extends ShopProduct
{
    public function getPlayLength()
    {
        return $this->playLength;
    }

    function getSummaryLine()
    {
        $base = "{$this->title} ({$this->producerMainName}, ";
        $base.= "{$this->producerFirstName} )";
        $base.= " : czas nagrania - {$this->playLength}";
        return $base;
    }

}

class BookProduct extends ShopProduct
{
    public function getNumOfPages()
    {
        return $this->numPages;
    }

    function getSummaryLine()
    {
        $base = "{$this->title} ({$this->producerMainName}, ";
        $base.= "{$this->producerFirstName} )";
        $base.= " : liczba stron - {$this->numPages}";
        return $base;
    }
}

$product1 = new BookProduct("Moja Antonina", "Willa", "Carter", 59.99, 520);
$product2 = new CdProduct("Exile on Coldharbour Lane", "The", "Alabama 3", 25.99, 18);


print "Autor     : ".$product1->getProducer()."\n";
print "Wykonawca : ".$product2->getProducer()."\n";
















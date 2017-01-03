<?php
// Dziedziczenie part 3 (Dziedziczenie a konstruktory)


class ShopProduct
{
    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $price;

    function __construct($title, $firstName, $mainName, $price)
    {
        $this->title             = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName  = $mainName;
        $this->price             = $price;
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
    public $playLength;

    function __construct($title, $firstName, $mainName, $price, $playLength)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->playLength = $playLength;
    }

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
    public $numPages;

    function __construct($title, $firstName, $mainName, $price, $numPages)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->numPages = $numPages;
    }

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
















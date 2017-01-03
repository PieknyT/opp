<?php
// Dziedziczenie part 1


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

    /**
     * @return int
     */
    public function getNumOfPages()
    {
        return $this->numPages;
    }

    /**
     * @return int
     */
    public function getPlayLength()
    {
        return $this->playLength;
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

$product1 = new ShopProduct("Moja Antonina", "Willa", "Carter", 59.99);
$product2 = new ShopProduct("Exile on Coldharbour Lane", "The", "Alabama 3", 25.99);

print "Autor     : ".$product1->getProducer()."\n";
print "Wykonawca : ".$product2->getProducer()."\n";
















<?php
// Dziedziczenie part 1


class CdProduct
{
    public $playLength;
    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $price;

    function __construct($title, $firstName, $mainName, $price, $playLength = 0)
    {
        $this->title             = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName  = $mainName;
        $this->price             = $price;
        $this->playLength        = $playLength;
    }

    /**
     * @return count play lenght
     */
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

    function getProducer()
    {
        return "{$this->producerFirstName} ".
               "{$this->producerMainName}";
    }


}

class BookProduct
{
    public $numPages;
    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $price;

    function __construct($title, $firstName, $mainName, $price, $numPages = 0)
    {
        $this->title             = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName  = $mainName;
        $this->price             = $price;
        $this->numPages          = $numPages;
    }

    /**
     * @return count of pages
     */
    public function getNumOfPages()
    {
        return $this->numPages;
    }

    function getProducer()
    {
        return "{$this->producerFirstName} ".
               "{$this->producerMainName}";
    }

    function getSummaryLine()
    {
        $base = "{$this->title} ({$this->producerMainName}, ";
        $base = "{$this->producerFirstName} )";
        $base.= " : liczba stron - {$this->numPages}";
        return $base;
    }
}

class ShopProductWriter
{
    public function write($shopProduct)
    {
        if(!($shopProduct instanceof CdProduct) && !($shopProduct instanceof BookProduct))  // czemu tak nnie || ?????????????????????????????????
        {
            die ("Przekazano obiekt niewłaściwego typu");
        }
        $str = "{$shopProduct->title}: "
               . $shopProduct->getProducer()
               . " ({$shopProduct->price})\n";
        print $str;
    }
}






$product1 = new BookProduct("Moja Antonina", "Willa", "Carter", 59.99, 520);
$product2 = new CdProduct("Exile on Coldharbour Lane", "The", "Alabama 3", 25.99, 18);


$writer = new ShopProductWriter();
$writer-> write($product1);
$writer-> write($product2);


//print "Autor     : ".$product1->getProducer()."\n";
//print "Wykonawca : ".$product2->getProducer()."\n";
















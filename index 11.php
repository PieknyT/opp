<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php


// Zarządzanie dostępem do klasy - public, private, protected


class ShopProduct
{
    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $discount = 0;
    protected $price;

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
        $base = "{$this->title} ({$this->producerFirstName} {$this->producerMainName}) ";
        return $base;
    }

    public function setDiscount($num)
    {
        $this->discount = $num;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return ($this->price - $this->discount);
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
        $base = "Płyta : ";
        $base.= parent::getSummaryLine();
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
        $base = "Książka : ";
        $base.= parent::getSummaryLine();
        $base.= " : liczba stron - {$this->numPages}";
        return $base;
    }

    public function getPrice()
    {
        return ($this->price);
    }
}

$product1 = new BookProduct("Moja Antonina", "Willa", "Carter", 59.99, 520);

$product2 = new CdProduct("Exile on Coldharbour Lane", "The", "Alabama 3", 25.99, 18);

$product1->setDiscount(5);
$product2->setDiscount(10);

print $product1->getSummaryLine()."\n cena: ".$product1->getPrice()."<br>";
print $product2->getSummaryLine()."\n cena: ".$product2->getPrice()."<br>";

print $product1->getPrice();
















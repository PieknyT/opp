<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php


// Zarządzanie dostępem do klasy  (Klasy hierarchii ShopProduct)


class ShopProduct
{
    private $title;
    private $producerMainName;
    private $producerFirstName;
    protected $price;
    private $discount = 0;

    public function __construct($title, $firstName, $mainName, $price)
    {
        $this->title             = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName  = $mainName;
        $this->price             = $price;
    }

    /**
     * @return string
     */
    public function getProducerFirstName()
    {
        return $this->producerFirstName;
    }

    /**
     * @return string
     */
    public function getProducerMainName()
    {
        return $this->producerMainName;
    }

    /**
     * @param int $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    /**
     * @return int
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return ($this->price - $this->discount);
    }

    public function getProducer()
    {
        return "{$this->producerFirstName}"."{$this->producerMainName}";
    }

    public function getSummaryLine()
    {
        $base = "{$this->title}({$this->producerMainName}, ";
        $base.= "{$this->producerFirstName})";
        return $base;
    }
}

class CdProduct extends ShopProduct
{
    private $playLength = 0;

    public function __construct($title, $firstName, $mainName, $price, $playLenght)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->playLength = $playLenght;
    }

    /**
     * @return int
     */
    public function getPlayLength()
    {
        return $this->playLength;
    }

    public function getSummaryLine()
    {
        $base = parent::getSummaryLine();
        $base.= ": czas nagrania - {$this->playLength}";
        return $base;
    }
}

class BookProduct extends ShopProduct
{
    private $numPages;

    public function __construct($title, $firstName, $mainName, $price, $numPage)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->numPages = $numPage;
    }

    /**
     * @return int
     */
    public function getNumOfPages()
    {
        return $this->numPages;
    }

    public function getSummaryLine()
    {
        $base = parent::getSummaryLine();
        $base.= " : liczba stron - {$this->getNumOfPages()}";
        return $base;
    }

    public function getPrice()
    {
        return $this->price;
    }

}


class ShopProductWriter
{
    private $products = array();

    public function addProduct (ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }

    public function write()
    {
        $str = "";
        foreach ($this->products as $shopProduct)
        {
            $str.="{$shopProduct->getTitle()}: ";
            $str.= "{$shopProduct->getProducer()}";
            $str.=" ({$shopProduct->getPrice()})\n"."<br>";
        }
        print $str;
    }
}



$product1 = new BookProduct("Moja Antonina", "Willa", "Carter", 59.99, 520);
$product2 = new CdProduct("Exile on Coldharbour Lane", "The", "Alabama 3", 25.99, 18);


$writer = new ShopProductWriter();
$writer->addProduct($product1);
$writer->write();
$writer->addProduct($product2);
$product2->setDiscount(10);
$writer->write();
$product2->setDiscount(5);
$writer->write();





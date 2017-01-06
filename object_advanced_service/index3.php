<head>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <meta charset = utf8-polish-ci"/>
</head>

<?php
// Zawansowana obsługa obiektów   (składowwe stałe)

class ShopProduct
{
    const AVAILABLE      = 0;
    const OUT_OF_STOCK   = 1;
    const INSCRIPTION    = "kartoflisko";
    const TOTAL_DISCOUNT = 5.9;
    private $id;
    private $title;
    private $producerMainName;
    private $producerFirstName;
    private $discount = 0;
    protected $price;

    public function __construct($title, $firstName, $mainName, $price)
    {
        $this->title             = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName  = $mainName;
        $this->price             = $price;
    }

    public function setID($id)
    {
        $this->id = $id;
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
        return "{$this->producerFirstName} "."{$this->producerMainName}";
    }

    public function getSummaryLine()
    {
        $base = "{$this->title}({$this->producerMainName}, ";
        $base.= "{$this->producerFirstName})";
        return $base;
    }

    public static function getInstance($id, PDO $pdo)
    {
        $stmt   = $pdo->prepare("select * from products where product_id = ?");
        $result = $stmt->execute(array($id));
        $row    = $stmt->fetch();

        if (empty($row)) {return null;}

        if($row['type'] == "book")
        {
            $product = new BookProduct(
                                $row['title'],
                                $row['firstname'],
                                $row['mainname'],
                                $row['price'],
                                $row['numpages']);
        }
        elseif ($row['type'] == "cd")
        {
            $product = new CdProduct(
                                $row['title'],
                                $row['firstname'],
                                $row['mainname'],
                                $row['price'],
                                $row['playlenght']);
        }
        else
        {
            $product = new ShopProduct(
                                $row['title'],
                                $row['firstname'],
                                $row['mainname'],
                                $row['price']);
        }

        $product->setID($row['product_id']);
        $product->setDiscount($row['discount']);
        return $product;

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
            $str.="{$shopProduct->getTitle()}:\n";
            $str.= "{$shopProduct->getProducer()}\n";
            $str.=" ({$shopProduct->getPrice()})\n"."<br>";
        }
        print $str;
    }
}

//doing

print ShopProduct::AVAILABLE."<br>";
print ShopProduct::OUT_OF_STOCK."<br>";
print ShopProduct::INSCRIPTION."<br>";
print ShopProduct::TOTAL_DISCOUNT."<br>";














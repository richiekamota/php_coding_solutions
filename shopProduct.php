<?php

/**
 * Class ShopProduct
 * Represents a generic shop product.
 */
class ShopProduct {

    /** @var string The title of the product. */
    private $title;

    /** @var string The main name of the producer. */
    private $producerMainName;

    /** @var string The first name of the producer. */
    private $producerFirstName;

    /** @var float The price of the product. */
    protected $price;

    /** @var float The discount on the product price. */
    private $discount = 0;

    /**
     * ShopProduct constructor.
     * @param string $title The title of the product.
     * @param string $firstName The first name of the producer.
     * @param string $mainName The main name of the producer.
     * @param float $price The price of the product.
     */
    public function __construct($title, $firstName, $mainName, $price) {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
    }

    /**
     * Get the first name of the producer.
     * @return string The first name of the producer.
     */
    public function getProducerFirstName() {
        return $this->producerFirstName;
    }

    /**
     * Get the main name of the producer.
     * @return string The main name of the producer.
     */
    public function getProducerMainName() {
        return $this->producerMainName;
    }

    /**
     * Set the discount on the product price.
     * @param float $num The discount value.
     */
    public function setDiscount($num) {
        $this->discount = $num;
    }

    /**
     * Get the title of the product.
     * @return string The title of the product.
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Get the price of the product after applying discount.
     * @return float The price of the product.
     */
    public function getPrice() {
        return ($this->price - $this->discount);
    }

    /**
     * Get the producer's full name.
     * @return string The producer's full name.
     */
    public function getProducer() {
        return "{$this->producerFirstName} {$this->producerMainName}";
    }

    /**
     * Get the summary line of the product.
     * @return string The summary line of the product.
     */
    public function getSummaryLine() {
        $base = "{$this->title} ({$this->producerMainName}, {$this->producerFirstName})";
        return $base;
    }
}

/**
 * Class CdProduct
 * Represents a CD product.
 */
class CdProduct extends ShopProduct {

    /** @var int The play length of the CD in minutes. */
    private $playLength = 0;

    /**
     * CdProduct constructor.
     * @param string $title The title of the CD.
     * @param string $firstName The first name of the producer.
     * @param string $mainName The main name of the producer.
     * @param float $price The price of the CD.
     * @param int $playLength The play length of the CD in minutes.
     */
    public function __construct($title, $firstName, $mainName, $price, $playLength) {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->playLength = $playLength;
    }

    /**
     * Get the play length of the CD.
     * @return int The play length in minutes.
     */
    public function getPlayLength() {
        return $this->playLength;
    }

    /**
     * Get the summary line of the CD product.
     * @return string The summary line of the CD product.
     */
    public function getSummaryLine() {
        $base = parent::getSummaryLine();
        $base .= ": playing time - {$this->playLength}";
        return $base;
    }
}

/**
 * Class BookProduct
 * Represents a book product.
 */
class BookProduct extends ShopProduct {

    /** @var int The number of pages in the book. */
    private $numPages;

    /**
     * BookProduct constructor.
     * @param string $title The title of the book.
     * @param string $firstName The first name of the producer.
     * @param string $mainName The main name of the producer.
     * @param float $price The price of the book.
     * @param int $numPages The number of pages in the book.
     */
    public function __construct($title, $firstName, $mainName, $price, $numPages) {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->numPages = $numPages;
    }

    /**
     * Get the number of pages in the book.
     * @return int The number of pages.
     */
    public function getNumberOfPages() {
        return $this->numPages;
    }

    /**
     * Get the summary line of the book product.
     * @return string The summary line of the book product.
     */
    public function getSummaryLine() {
        $base = parent::getSummaryLine();
        $base .= ": page count - {$this->numPages}";
        return $base;
    }
}

/**
 * Class ShopProductWriter
 * Writes product details to output.
 */
class ShopProductWriter {
    /** @var array List of ShopProduct objects. */
    public $products = array();

    /**
     * Add a product to the writer.
     * @param ShopProduct $shopProduct The product to add.
     */
    public function addProduct(ShopProduct $shopProduct) {
        $this->products[] = $shopProduct;
    }

    /**
     * Write product details to output.
     */
    public function write() {
        $str = "";
        foreach ($this->products as $shopProduct) {
            $str .= "{$shopProduct->getTitle()}: ";
            $str .= $shopProduct->getProducer();
            $str .= " ({$shopProduct->getPrice()})\n";
        }
        echo $str;
    }
}

?>

<?php

// Define an interface for product writers
interface ProductWriter {
    public function addProduct(ShopProduct $shopProduct);
    public function write();
}

// Abstract class implementing ProductWriter interface
abstract class ShopProductWriter implements ProductWriter {
    protected $products = [];

    public function addProduct(ShopProduct $shopProduct) {
        $this->products[] = $shopProduct;
    }

    abstract public function write();
}

// XML product writer implementation
class XmlProductWriter extends ShopProductWriter {
    public function write() {
        $xml = new XMLWriter();
        $xml->openMemory();
        $xml->startDocument('1.0', 'UTF-8');
        $xml->startElement("products");

        foreach ($this->products as $shopProduct) {
            $xml->startElement("product");
            $xml->writeAttribute("title", $shopProduct->getTitle());
            $xml->startElement("summary");
            $xml->text($shopProduct->getSummaryLine());
            $xml->endElement(); // for summary
            $xml->endElement(); // for product
        }

        $xml->endElement(); // products
        $xml->endDocument();
        echo $xml->flush();
    }
}

// Text product writer implementation
class TextProductWriter extends ShopProductWriter {
    public function write() {
        $output = "PRODUCTS:\n";
        foreach ($this->products as $shopProduct) {
            $output .= $shopProduct->getSummaryLine() . "\n";
        }
        echo $output;
    }
}

// Usage example:
$writer = new XmlProductWriter();
$writer->addProduct(new ShopProduct("Product 1", "Description 1"));
$writer->addProduct(new ShopProduct("Product 2", "Description 2"));
$writer->write();

$textWriter = new TextProductWriter();
$textWriter->addProduct(new ShopProduct("Product 3", "Description 3"));
$textWriter->addProduct(new ShopProduct("Product 4", "Description 4"));
$textWriter->write();

// ShopProduct class (assuming this exists and is used by writers)
class ShopProduct {
    private $title;
    private $description;

    public function __construct($title, $description) {
        $this->title = $title;
        $this->description = $description;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getSummaryLine() {
        return $this->description;
    }
}

?>

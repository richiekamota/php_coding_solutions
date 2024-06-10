<?php

trait PriceUtilities {
    private $taxRate = 17; // Instance property to hold the tax rate

    // Instance method to calculate tax based on the instance tax rate
    public function calculateTax($price) {
        return ($this->taxRate / 100) * $price;
    }

    // Abstract method declaration for the tax rate
    abstract public function getTaxRate();
}

class ShopProduct {
    use PriceUtilities;
    
    public function __construct() {
        // Constructor logic (if needed)
    }

    // Implementation of the required getTaxRate method for PriceUtilities trait
    public function getTaxRate() {
        return $this->taxRate;
    }
}

$p = new ShopProduct();
echo $p->calculateTax(100) . "\n"; // Calculate tax using instance tax rate

?>

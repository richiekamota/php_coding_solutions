<?php

trait IdentityTrait {
    public function generateId() {
        return uniqid();
    }
}

trait PriceUtilities {
    private $taxrate = 17;

    function calculateTax($price) {
        return (($this->taxrate/100) * $price);
    }
}

class ShopProduct {
    use PriceUtilities, IdentityTrait;

    public function __construct()
    {
    }
    // Implement the abstract method getTaxRate() required by the PriceUtilities trait
    public function getTaxRate() {
        return 17; // Fixed tax rate for UtilityService
    }
}

$p = new ShopProduct();
print $p->calculateTax(100) . "\n";
print $p->generateId() . "\n";

?>
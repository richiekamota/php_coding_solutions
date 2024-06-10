<?php

trait PriceUtilities {
    public function calculateTax($price) {
        return (($this->getTaxRate() / 100) * $price);
    }

    abstract public function getTaxRate(); // Abstract method required by the trait
}

abstract class Service {
    // Base class for service-oriented functionality
}

class UtilityService extends Service {
    use PriceUtilities {
        calculateTax as public; // Make calculateTax method public within UtilityService
    }

    public function __construct()
    {
    }
    // Implement the abstract method getTaxRate() required by the PriceUtilities trait
    public function getTaxRate() {
        return 17; // Fixed tax rate for UtilityService
    }
}

// Instantiate UtilityService
$u = new UtilityService();

// Calculate tax for a given price using calculateTax method from PriceUtilities trait
$taxAmount = $u->calculateTax(100);
echo "Tax for \$100: $taxAmount\n";

?>

<?php

/**
 * 
 * Trait PriceUtilities:

 * The PriceUtilities trait defines a static method calculateTax($price) to compute the tax amount based on the static tax rate ($taxRate).
 * Class UtilityService:

 * UtilityService extends Service and uses the PriceUtilities trait.
 * It implements the getTaxRate() method to provide the tax rate required by the calculateTax() method in the trait.
 * Accessing calculateTax() Method:

 * To use the calculateTax() method from the PriceUtilities trait within UtilityService, we call it statically using self::calculateTax($price).
 * Usage Example:

 * The exampleTaxCalculation() method in UtilityService demonstrates how to utilize the calculateTax() method from the trait.
 * We call UtilityService::exampleTaxCalculation(100) to calculate the tax amount for a given price of $100.
 * Troubleshooting Tips:
 * Namespace Issues: Ensure that the namespace of the trait and the classes (Service, UtilityService) are correctly defined and consistent.

 * Visibility and Scope: Confirm that the methods (calculateTax(), getTaxRate()) are correctly declared as public static within the trait and the implementing class.

 * Method Availability: Double-check that the calculateTax() method is indeed defined within the PriceUtilities trait and that it's accessible within the context of UtilityService.
 * 
 * 
 * 
 */

trait PriceUtilities {
    private static $taxRate = 17; // Static property to hold the tax rate

    // Static method to calculate tax based on the static tax rate
    public static function calculateTax($price) {
        return (self::$taxRate / 100) * $price;
    }

    // Abstract method declaration for the tax rate
    abstract public static function getTaxRate();
}

class Service {
    // Base class for service-oriented functionality
}

class UtilityService extends Service {
    use PriceUtilities; // Use the PriceUtilities trait in UtilityService

    // Implementation of the abstract method getTaxRate() required by PriceUtilities trait
    public static function getTaxRate() {
        return self::$taxRate;
    }

    // Example usage of the calculateTax() method from the trait
    public static function exampleTaxCalculation($price) {
        return self::calculateTax($price); // Call calculateTax() from PriceUtilities trait
    }
}

// Usage example:
$taxAmount = UtilityService::exampleTaxCalculation(100);
echo "Tax for \$100: $taxAmount\n";

?>


<?php

class Checkout {
    public function totalize() {
        // Original bill calculation logic
        return "Calculating total bill...";
    }
}

class IllegalCheckout extends Checkout {
    final public function totalize() {
        // Custom bill calculation logic (illegal override)
        return "Calculating total bill with illegal modifications...";
    }
}

// Usage example
$checkout = new Checkout();
echo $checkout->totalize() . "\n"; // Output: "Calculating total bill..."

$illegalCheckout = new IllegalCheckout();
echo $illegalCheckout->totalize() . "\n"; // Output: "Calculating total bill with illegal modifications..."

/*
Class Hierarchy (Checkout and IllegalCheckout):

Checkout is a superclass that defines a method totalize() responsible for calculating the total bill.
IllegalCheckout is a subclass that extends Checkout and attempts to override the totalize() method.
Method Overriding and final Modifier:

In object-oriented programming, method overriding allows a subclass to provide a specific implementation of a method defined in its superclass.
The final modifier in PHP is used to prevent further overriding of a method by subclasses. When a method is declared as final, it cannot be overridden by any subclass.
Refactoring Explanation:

The refactored example includes a Checkout class with a simple totalize() method that returns a generic message for calculating the total bill.
The IllegalCheckout class extends Checkout and attempts to override the totalize() method with a custom implementation. However, the use of final in IllegalCheckout prevents this override.
Usage Example:

An instance of Checkout ($checkout) is created and its totalize() method is called, demonstrating the original bill calculation logic.
An instance of IllegalCheckout ($illegalCheckout) is created and its totalize() method is called, showing an attempt to modify the behavior illegally (blocked by final).
Key Concepts:

Inheritance: Subclassing (IllegalCheckout extends Checkout) allows for code reuse and specialization of behavior.
Method Override: Subclasses can override superclass methods to provide specific implementations tailored to their needs.
Final Modifier: Use of final prevents further overriding of a method, ensuring that specific behaviors defined in superclass methods remain unchanged or protected from modification.
Additional Considerations:
Design Patterns: Understand the principles of inheritance, method overriding, and access control (final modifier) to design robust and maintainable object-oriented systems.

Encapsulation and Polymorphism: Leverage inheritance, encapsulation, and polymorphism to model real-world relationships and behaviors effectively.

Best Practices: Use final judiciously to enforce design decisions and prevent unintended modifications in subclasses.
*/
?>

<?php

class Person {
    private $data = [
        'name' => 'Bob',
        'age' => 44
    ];

    public function __get($property) {
        if (array_key_exists($property, $this->data)) {
            return $this->data[$property];
        } else {
            // Handle undefined properties gracefully
            throw new Exception("Undefined property: $property");
        }
    }

    public function __isset($property) {
        return array_key_exists($property, $this->data);
    }
}

$p = new Person();

// Using __isset to check property existence
if (isset($p->name)) {
    echo $p->name . "\n";
} else {
    echo "Property 'name' does not exist.\n";
}

// Output:
// Bob
/*
 * Explanation and Education:
 Interceptors (__get and __isset):

__get($property): This magic method is triggered when attempting to access a non-accessible or undefined property of an object. In this refactored class, we use __get to retrieve values from a private $data array based on property names.
__isset($property): This magic method is invoked when using isset() or empty() on an object property. Here, __isset checks if a property exists within the $data array.
Private Data Storage ($data):

We use a private $data array within the Person class to store properties (name and age). This encapsulates the data and controls access through interceptors.
Property Access with Interceptors:

When accessing $p->name, the __get interceptor retrieves the value associated with the name property from the $data array.
If the property does not exist ($p->nonexistent_property), __get throws an Exception to handle undefined property access gracefully.
Property Existence Check (isset()):

We use isset($p->name) to check if the name property exists within the object. This invokes the __isset interceptor, which checks for the existence of name in the $data array.
Exception Handling:

In this refactored code, an Exception is thrown within __get when accessing undefined properties ($p->nonexistent_property). This demonstrates how to handle such scenarios.
Key Concepts:
Dynamic Property Access: Interceptors (__get, __isset) allow for dynamic handling of property access and existence checks, providing flexibility and encapsulation.

Encapsulation: Private data storage ($data) encapsulates object properties, ensuring controlled access through defined interception methods.

Exception Handling: Use of Exception handling within interceptors (__get) to gracefully manage undefined property access.

Additional Considerations:
Error Handling: Customize error handling within interceptors (__get, __isset) to suit specific requirements, such as logging or alternative behavior.

Security: Be cautious with dynamic property access and ensure that intercepted operations are safe and secure to prevent unintended consequences.

By refactoring and explaining the usage of interceptors (__get and __isset) in the Person class, you gain insight into dynamic property handling and interception mechanisms in PHP, enhancing flexibility and control over object behaviors. Adjustments can be made based on specific use cases and requirements.
 * 
 */
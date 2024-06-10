<?php

// PersonWriter class for writing person information
class PersonWriter {
    public function writeName(Person $p) {
        echo $p->getName() . "\n";
    }

    public function writeAge(Person $p) {
        echo $p->getAge() . "\n";
    }
}

// Person class representing a person with name and age
class Person {
    private $name = "Bob";
    private $age = 44;
    private $writer;

    // Constructor with dependency injection for PersonWriter
    public function __construct(PersonWriter $writer) {
        $this->writer = $writer;
    }

    // Magic method __call to delegate method calls to PersonWriter
    public function __call($method, $args) {
        if (method_exists($this->writer, $method)) {
            return $this->writer->$method($this);
        }
    }

    // Getter method for name
    public function getName() {
        return $this->name;
    }

    // Getter method for age
    public function getAge() {
        return $this->age;
    }
}

// Usage example
$writer = new PersonWriter(); // Create a PersonWriter instance
$person = new Person($writer); // Create a Person instance with dependency injection

// Directly call methods through __call delegation
$person->writeName(); // Output: "Bob"
$person->writeAge();  // Output: "44"

/*
Key Refactorings and Explanations:
Separation of Concerns:

PersonWriter is responsible for writing specific information about a Person, while Person focuses on representing a person and delegating writing tasks.
Dependency Injection (PersonWriter):

The Person class receives a PersonWriter instance via dependency injection in its constructor (__construct). This promotes loose coupling and flexibility.
Method Delegation (__call):

The __call magic method in Person dynamically delegates method calls (e.g., writeName, writeAge) to corresponding methods in PersonWriter if they exist.
Encapsulation (private properties):

Encapsulated name and age properties of Person as private to control access to these properties via getter methods (getName, getAge).
Usage Example:

Created a PersonWriter instance and passed it to a Person instance upon creation (new Person($writer)).
Demonstrated how Person delegates writing tasks (writeName, writeAge) to PersonWriter using method delegation ($person->writeName()).
Additional Notes:
Visibility (public methods):

Defined public visibility for methods in PersonWriter and Person classes to allow access from external code.
String Concatenation (echo):

Used echo instead of print for consistency and to directly output the results of method calls.
Error Handling:

This refactored code assumes that PersonWriter methods (writeName, writeAge) will always exist. Consider adding error handling or validation if necessary.
 * 
 */

?>

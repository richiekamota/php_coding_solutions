<?php

class Person {
    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function __toString() {
        return $this->getName() . " (age " . $this->getAge() . ")";
    }
}

$person = new Person("Bob", 44);
echo $person; // PHP automatically calls __toString() when using an object in a string context

?>

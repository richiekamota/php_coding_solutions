<?php

class Person {
    private $_name;
    private $_age;

    public function __construct()
    {
    }

    public function setName($name) {
        $this->_name = $name !== null ? strtoupper($name) : null;
    }

    public function setAge($age) {
        $this->_age = $age;
    }

    public function getName() {
        return $this->_name;
    }

    public function getAge() {
        return $this->_age;
    }

    public function __toString() {
        return "Name: " . ($this->_name ?: 'Unknown') . ", Age: " . ($this->_age ?: 'Unknown');
    }
}

// Example usage
$p = new Person();
$p->setName("Bob");
$p->setAge(44);
echo $p . "\n"; // Output: "Name: BOB, Age: 44"

// Attempting to unset properties directly will not work due to private visibility
// Uncommenting the following line will result in an error
// unset($p->_name);

?>

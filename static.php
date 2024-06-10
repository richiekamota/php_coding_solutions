<?php

class StaticExample {
    static public $aNum = 0;

    static public function sayHello() {
        self::$aNum++;
        print "hello (" . self::$aNum . ")\n";
    }
}

// Example usage:
StaticExample::sayHello(); // Output: Hello (1)
StaticExample::sayHello(); // Output: Hello (2)
StaticExample::sayHello(); // Output: Hello (3)
?>
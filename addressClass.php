<?php

class Address {
    private $number;
    private $street;

    public function __construct($maybenumber, $maybestreet = null) {
        if (is_null($maybestreet)) {
            $this->parseStreetAddress($maybenumber);
        } else {
            $this->number = $maybenumber;
            $this->street = $maybestreet;
        }
    }

    public function __set($property, $value) {
        if ($property === "streetaddress") {
            $this->parseStreetAddress($value);
        }
    }

    public function __get($property) {
        if ($property === "streetaddress") {
            return $this->number . " " . $this->street;
        }
    }

    private function parseStreetAddress($value) {
        if (preg_match("/^(\d+.*?)[\s,]+(.+)$/", $value, $matches)) {
            $this->number = $matches[1];
            $this->street = $matches[2];
        } else {
            throw new Exception("Unable to parse street address: '{$value}'");
        }
    }

    public function __toString() {
        return $this->number . " " . $this->street;
    }
}

// Example usage
try {
    $address = new Address("441b Bakers Street");
    echo "Address: $address\n";

    $address = new Address(15, "Albert Mews");
    echo "Address: $address\n";

    $address->streetaddress = "34, West 24th Avenue";
    echo "Address: $address\n";

    // This will throw an exception because the address cannot be parsed
    // $address->streetaddress = "failme";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

?>

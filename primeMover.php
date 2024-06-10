<?php
/**
 *
Developer: Mirza S. Baig

Date: 3-25-2014

Description:    Using the PHP language, have the function PrimeMover(num) return the
 *              numth prime number. The range will be from 1 to 10^4. For example: if
 *              num is 16 the output should be 53 as 53 is the 16th prime number.
 */

// Create and store all test vectors in an array
$vectors = array(16, 9, 100);

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '" . $vector . "':" . PHP_EOL;
    echo "Output:" . " " . PrimeMover($vector) . PHP_EOL;
}

function PrimeMover($num) {
    // Initialize an empty array to store prime numbers.
    $primeNumbers = array();

    // Starting number for prime checking
    $candidate = 2;

    // Loop until we have found the num-th prime number
    while (count($primeNumbers) < $num) {
        if (isPrime($candidate)) {
            $primeNumbers[] = $candidate;
        }
        $candidate++;
    }

    // Return the num-th prime number
    return $primeNumbers[$num - 1];
}

// Function to check if a number is prime
function isPrime($num) {
    if ($num <= 1) {
        return false;
    }
    if ($num <= 3) {
        return true;
    }
    if ($num % 2 == 0 || $num % 3 == 0) {
        return false;
    }
    $i = 5;
    while ($i * $i <= $num) {
        if ($num % $i == 0 || $num % ($i + 2) == 0) {
            return false;
        }
        $i += 6;
    }
    return true;
}

?>

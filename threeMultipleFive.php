<?php
/*
Developer: Mirza S. Baig

Date: 6-14-2014

Description: Using the PHP language, have the function ThreeFiveMultiples(num)
             return the sum of all the multiples of 3 and 5 that are below num.
             For example: if num is 10, the multiples of 3 and 5 that are below 10
             are 3, 5, 6, and 9, and adding them up you get 23, so your program
             should return 23. The integer being passed will be between 1 and 100.
*/

// Create and store all test vectors in an array.
$vectors = array(10, 6, 1);

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '{$vector}':" . PHP_EOL;
    echo "Output: " . ThreeFiveMultiples($vector) . PHP_EOL;
}

function ThreeFiveMultiples($num) {
    // Initialize the sum variable to accumulate the multiples of 3 and 5.
    $sum = 0;

    // Iterate through numbers below $num to find and sum multiples of 3 and 5.
    for ($i = 1; $i < $num; $i++) {
        if ($i % 3 === 0 || $i % 5 === 0) {
            $sum += $i;
        }
    }

    return $sum;
}

?>

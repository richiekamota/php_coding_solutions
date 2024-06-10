<?php
/*
Developer: Mirza S. Baig

Date: 3-27-2014

Description:    Using the PHP language, have the function greatestCommonFactor(num1,num2)
                take both parameters being passed and return the Greatest Common Factor.
                That is, return the greatest number that evenly goes into both numbers
                with no remainder. For example: 12 and 16 both are divisible by 1, 2, and
                4 so the output should be 4. The range for both parameters will be from
                1 to 10^3.

*/

// Store all test vectors in an array
$vectors = array(array(12, 16), array(7, 3), array(36, 54));

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '". implode(", ", $vector) . "':" . PHP_EOL;
    echo "Output:" . " " . greatestCommonFactor($vector[0], $vector[1]). PHP_EOL;
}

function greatestCommonFactor($num1, $num2) {
    // Implement Euclid's algorithm to find the greatest common factor (GCF)
    while ($num2 != 0) {
        // Get the remainder of the division
        $remainder = $num1 % $num2;
        // Shift the values for the next iteration
        $num1 = $num2;
        $num2 = $remainder;
    }
    // Return the greatest common factor
    return $num1;
}

?>

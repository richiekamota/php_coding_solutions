<?php
/*
Developer: [Your Name]

Date: [Current Date]

Description:    This PHP function calculates the factorial of a non-negative integer.

*/

function factorial($n) {
    // Check if the input is a non-negative integer
    if (!is_int($n) || $n < 0) {
        return "Factorial is undefined for negative numbers or non-integers.";
    }

    // Base case: factorial of 0 is 1
    if ($n === 0) {
        return 1;
    }

    // Initialize the result variable
    $result = 1;

    // Compute the factorial using a loop
    for ($i = 1; $i <= $n; $i++) {
        $result *= $i;
    }

    return $result;
}

// Test the factorial function with some sample inputs
$testCases = [0, 1, 5, 10];

foreach ($testCases as $num) {
    echo "Factorial of $num is " . factorial($num) . PHP_EOL;
}
?>

<?php
/*
Developer: [Your Name]

Date: [Current Date]

Description:    This PHP function calculates the factorial of a non-negative integer
                using the GMP extension in a concise two-line solution.

*/

function factorial($n) {
    return gmp_strval(gmp_fact($n));
}

// Test the factorial function with some sample inputs
$testCases = [0, 1, 5, 10, 20];

foreach ($testCases as $num) {
    echo "Factorial of $num is " . factorial($num) . PHP_EOL;
}
?>

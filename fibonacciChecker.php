<?php
/*
Developer: Mirza S. Baig

Date: 6-19-2014

Description: Using the PHP language, have the function FibonacciChecker(num) return the
             string 'yes' if the number given is part of the Fibonacci sequence. This
             sequence is defined by: Fn = Fn-1 + Fn-2, which means to find Fn you add the
             previous two numbers up. The first two numbers are 0 and 1, then
             comes 1, 2, 3, 5, etc. If num is not in the Fibonacci sequence, return the
             string 'no'.
*/

// Store all test vectors in an array.
$vectors = array(34, 54);

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '{$vector}':" . PHP_EOL;
    echo "Output: " . FibonacciChecker($vector) . PHP_EOL;
}

function FibonacciChecker($num) {
    // Check if the number is a perfect square when evaluated under the conditions of the Fibonacci sequence
    if (isPerfectSquare(5 * $num * $num + 4) || isPerfectSquare(5 * $num * $num - 4)) {
        return "yes";
    } else {
        return "no";
    }
}

function isPerfectSquare($num) {
    // Calculate the integer square root of the number
    $sqrt = (int) sqrt($num);

    // Check if the square of the integer square root equals the original number
    return ($sqrt * $sqrt == $num);
}
?>

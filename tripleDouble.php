<?php
/*
Developer: Mirza S. Baig

Date: 6-07-2014

Description: Using the PHP language, have the function TripleDouble(num1,num2) take
             both parameters being passed, and return 1 if there is a straight
             triple of a number at any place in num1 and also a straight double of
             the same number in num2. For example: if num1 equals 451999277 and
             num2 equals 41177722899, then return 1 because in the first parameter
             you have the straight triple 999 and you have a straight double, 99,
             of the same number in the second parameter. If this isn't the case,
             return 0.
*/

// Store all test vectors in an array
$vectors = array(
    array("451999277", "41177722899"),
    array("465555", "5579"),
    array("67844", "66237")
);

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    // Join the vector elements into a single string for display
    $testVector = implode(",", $vector);
    echo "Test Vector: '" . $testVector . "':" . PHP_EOL;
    echo "Output: " . TripleDouble($vector[0], $vector[1]) . PHP_EOL;
}

function TripleDouble($num1, $num2) {
    // Check for a straight triple in num1 and a straight double in num2
    if (hasStraightTriple($num1) && hasStraightDouble($num2)) {
        return 1;
    } else {
        return 0;
    }
}

// Helper function to check for a straight triple in a number
function hasStraightTriple($num) {
    // Loop through the number characters
    for ($i = 0; $i <= strlen($num) - 3; $i++) {
        $digit = $num[$i];
        // Check if the next two characters are the same as the current character
        if ($num[$i + 1] == $digit && $num[$i + 2] == $digit) {
            return true; // Found a straight triple
        }
    }
    return false; // No straight triple found
}

// Helper function to check for a straight double in a number
function hasStraightDouble($num) {
    // Loop through the number characters
    for ($i = 0; $i <= strlen($num) - 2; $i++) {
        // Check if the next character is the same as the current character
        if ($num[$i + 1] == $num[$i]) {
            return true; // Found a straight double
        }
    }
    return false; // No straight double found
}

?>

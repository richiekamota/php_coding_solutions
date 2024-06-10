<?php
/*
Developer: Mirza S. Baig

Date: 3-21-2014

Description: Using the PHP language, have the function RunLength(str) take the str
             parameter being passed and return a compressed version of the string
             using the Run-length encoding algorithm. This algorithm works by taking
             the occurrence of each repeating character and outputting that number
             along with a single character of the repeating sequence. For example:
             "wwwggopp" would return 3w2g1o2p. The string will not contain any
             numbers, punctuation, or symbols.
*/

// Create and store all test vectors in an array
$vectors = array("wwwggopp", "aabbcde", "wwwbbbw");

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '". $vector . "':" . PHP_EOL;
    echo "Output:" . " " . RunLength($vector). PHP_EOL;
}

function RunLength($str) {
    // Initialize variables
    $result = '';
    $length = strlen($str);
    $count = 1;

    // Iterate over each character in the string
    for ($i = 0; $i < $length; $i++) {
        // Check if current character is the same as the next character
        if ($i + 1 < $length && $str[$i] === $str[$i + 1]) {
            $count++; // Increment count if characters are the same
        } else {
            $result .= $count . $str[$i]; // Append count and character to result
            $count = 1; // Reset count for new character
        }
    }

    return $result;
}
?>

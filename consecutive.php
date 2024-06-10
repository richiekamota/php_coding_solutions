<?php
/*
 *
Developer: Mirza S. Baig

Date: 4-27-2014

Description:    Using the PHP language, have the function Consecutive(arr) take the
                array of integers stored in arr and return the minimum number of
                integers needed to make the contents of arr consecutive from the
                lowest number to the highest number. For example: If arr contains
                [4, 8, 6] then the output should be 2 because two numbers need to be
                added to the array (5 and 7) to make it a consecutive array of numbers
                from 4 to 8. Negative numbers may be entered as parameters and no array
                will have less than 2 elements.

*/

function Consecutive($arr) {
    // Get the highest and lowest values in the array
    $min = min($arr);
    $max = max($arr);

    // Calculate the expected length of a consecutive sequence
    $expectedLength = $max - $min + 1;

    // Calculate the actual length of the array
    $actualLength = count($arr);

    // Calculate the number of integers needed to make the array consecutive
    $integersNeeded = $expectedLength - $actualLength;

    return $integersNeeded;
}

// Test vectors for the Consecutive function
$vectors = array(array(4, 8, 6), array(5, 10, 15), array(-2, 10, 4));

// Execute the test vectors using the function and display results
foreach ($vectors as $vector) {
    echo "Test Vector: '" . implode(" , ", $vector) . "':" . PHP_EOL;
    echo "Output:" . " " . Consecutive($vector) . PHP_EOL;
}
?>

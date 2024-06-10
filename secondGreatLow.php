<?php
 function SecondGreatLow($arr) {
    // Sort the array in ascending order
    sort($arr);

    // Remove duplicates from the sorted array
    $uniqueArr = array_unique($arr);

    // If there are less than two unique numbers in the array, return an empty string
    if (count($uniqueArr) < 2) {
        return "";
    }

    // Get the second lowest number
    $secondLowest = $uniqueArr[1];

    // Get the second highest number
    $secondHighest = $uniqueArr[count($uniqueArr) - 2];

    // Return the second lowest and second highest numbers separated by a space
    return "$secondLowest $secondHighest";
}

// Test vectors
$arr1 = [7, 7, 12, 98, 106];
$arr2 = [1, 42, 42, 180];
$arr3 = [4, 90];

// Store all test vectors in an array
$vectors = [$arr1, $arr2, $arr3];

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '" . implode(", ", $vector) . "':" . PHP_EOL;
    echo "Output: " . SecondGreatLow($vector) . PHP_EOL;
}

?>
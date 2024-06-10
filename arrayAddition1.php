<?php
/*
Developer: Mirza S. Baig

Date: 2-10-2014

Description: Using the PHP language, have the function ArrayAdditionI(arr) take the array of numbers stored in arr 
and return the string true if any combination of numbers in the array can be added up to equal the largest number 
in the array, otherwise return the string false. For example: if arr contains [4, 6, 23, 10, 1, 3] the output should 
return true because 4 + 6 + 10 + 3 = 23. The array will not be empty, will not contain all the same elements, and 
may contain negative numbers.
*/

function ArrayAdditionI($arr) {
    // Get the largest value in the array
    $max = max($arr);

    // Remove the largest value from the array
    $arr = array_diff($arr, [$max]);

    // Sort the array in ascending order
    sort($arr);

    // Calculate the total sum of the remaining values in the array
    $totalSum = array_sum($arr);

    // If total sum is less than the largest value, return false
    if ($totalSum < $max) {
        return false;
    }

    // Check if there's a subset of the array that sums up to the largest value
    return canSumToTarget($arr, $max);
}

// Helper function to check if a subset of an array can sum up to a target value
function canSumToTarget($arr, $target) {
    $subsetSums = [0];

    foreach ($arr as $num) {
        $newSubsetSums = $subsetSums;
        foreach ($subsetSums as $sum) {
            $newSum = $sum + $num;
            if ($newSum == $target) {
                return true;
            }
            $newSubsetSums[] = $newSum;
        }
        $subsetSums = array_unique($newSubsetSums);
    }

    return false;
}

// Define test vectors
$arr1 = [4, 6, 23, 10, 1, 3];
$arr2 = [3, 5, -1, 8, 12];
$arr3 = [5, 7, 16, 1, 2];
$arr4 = [1, 5, 9, 8, -8, -56, 500];

// Store test vectors in an array
$vectors = [$arr1, $arr2, $arr3, $arr4];

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: [" . implode(", ", $vector) . "]" . PHP_EOL;
    echo "Output: " . (ArrayAdditionI($vector) ? "true" : "false") . PHP_EOL;
}
?>

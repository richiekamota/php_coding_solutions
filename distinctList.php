<?php
/*
Developer: Mirza S. Baig

Date: 6-30-2014

Description:    Using the PHP language, have the function DistinctList(arr) take the array of
                numbers stored in arr and determine the total number of duplicate entries.
                For example if the input is [1, 2, 2, 2, 3] then your program should output
                2 because there are two duplicates of one of the elements.
*/

function DistinctList($arr) {
    // Count duplicate entries
    $duplicateCount = 0;

    // Count occurrences of each element
    $elementCount = array_count_values($arr);

    // Iterate through the element counts
    foreach ($elementCount as $count) {
        // If an element occurs more than once, add the excess occurrences to duplicateCount
        if ($count > 1) {
            $duplicateCount += $count - 1;
        }
    }

    // Return the total number of duplicate entries
    return $duplicateCount;
}

// Create and store all test vectors in an array.
$vectors = array(array(1, 2, 2, 2, 3), array(0, -2, -2, 5, 5, 5), array(100, 2, 101, 4));

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '" . implode(",", $vector) . "':" . PHP_EOL;
    echo "Output:" . " " . DistinctList($vector) . PHP_EOL;
}
?>

<?php

function MeanMode($arr) {
    // Calculate the mean (average) of the array
    $mean = array_sum($arr) / count($arr);

    // Calculate the mode (most frequently occurring value) of the array
    $arrTemp = array_count_values($arr);

    // Sort the frequency array in descending order based on values
    arsort($arrTemp);

    // Get the first element (mode) from the sorted frequency array
    $mode = key($arrTemp);

    // Check if the mode equals the mean
    if ($mode == $mean) {
        return 1; // Return 1 if mode equals mean
    } else {
        return 0; // Return 0 if mode does not equal mean
    }
}

// Test vectors for the MeanMode function
$vectors = [
    [1, 2, 3],           // Expected output: 0 (mode != mean)
    [4, 4, 4, 6, 2],     // Expected output: 1 (mode == mean)
    [5, 3, 3, 3, 1]      // Expected output: 1 (mode == mean)
];

// Execute the test vectors using the function and display results
foreach ($vectors as $vector) {
    echo "Test Vector: '" . implode(", ", $vector) . "':" . PHP_EOL;
    echo "Output: " . MeanMode($vector) . PHP_EOL;
}
?>
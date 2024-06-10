<?php

function DivisionStringified($num1, $num2) {
    // Calculate the division result
    $result = $num1 / $num2;

    // Check if the number of digits in the result is 4 or more
    if (strlen((string) $result) >= 4) {
        // Format the division result with commas
        return number_format(floor($result));
    } else {
        // Return the rounded result without commas
        return round($result);
    }
}

// Test vectors with num1 and num2 values
$vectors = [
    [2, 3],            // Expected output: 1 (no commas)
    [123456789, 10000],// Expected output: 12,345
    [5, 2],            // Expected output: 3 (no commas)
    [6874, 67]         // Expected output: 103 (no commas)
];

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    $num1 = $vector[0];
    $num2 = $vector[1];
    echo "Test Vector: '$num1, $num2':" . PHP_EOL;
    echo "Output: " . DivisionStringified($num1, $num2) . PHP_EOL;
}

?>
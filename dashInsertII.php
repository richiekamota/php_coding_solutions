<?php
/*
Developer: Mirza S. Baig

Date: 5-15-2014

Description:    Using the PHP language, have the function DashInsertII(num) insert
                dashes ('-') between each two odd numbers and insert asterisks ('*')
                between each two even numbers in num. For example: if num is 4546793
                the output should be 454*67-9-3. Don't count zero as a negative or
                positive number.

*/

// Store all test vectors in an array
$vectors = array(4546793, 99946, 56647304);

// Execute the test vectors using the function and display results
foreach ($vectors as $vector) {
    echo "Test Vector: '" . $vector . "':" . PHP_EOL;
    echo "Output:" . " " . DashInsertII($vector) . PHP_EOL;
}

function DashInsertII($num) {
    // Split the input number into an array of characters
    $arr = str_split($num);

    // Iterate through the array to insert dashes and asterisks
    for ($i = 0; $i < count($arr); $i++) {
        // Check if the current number is odd
        if ($arr[$i] % 2 !== 0) {
            // Insert a dash between two odd numbers (skip if at the start of the array)
            if ($i !== 0 && $arr[$i-1] % 2 !== 0 && $arr[$i-1] !== "0") {
                $arr[$i] = "-" . $arr[$i];
            }
        }
        // Check if the current number is even (including zero)
        elseif ($arr[$i] % 2 === 0) {
            // Insert an asterisk between two even numbers (skip if at the start of the array)
            if ($i !== 0 && $arr[$i-1] % 2 === 0 && $arr[$i-1] !== "0") {
                $arr[$i] = "*" . $arr[$i];
            }
        }
    }

    // Concatenate all elements in the array to form the final string
    $result = implode("", $arr);

    return $result;
}
?>

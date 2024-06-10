<?php


/*Description:    Using the PHP language, have the function DashInsert(num) insert dashes
                 ('-') between each two odd numbers in num. For example: if num is
                454793 the output should be 4547-9-3. Don't count zero as
                an odd number.
*/
                
function DashInsert($num) {
    // Split the input number into an array of digits
    $digits = str_split($num);

    // Iterate through the array of digits
    for ($i = 0; $i < count($digits); $i++) {
        // Check if the current digit is odd and not the first digit in the array
        if ($digits[$i] % 2 !== 0 && $i !== 0) {
            // Check if the previous digit is also odd
            if ($digits[$i - 1] % 2 !== 0) {
                // Insert a dash before the current odd digit
                $digits[$i] = '-' . $digits[$i];
            }
        }
    }

    // Join the modified array of digits back into a string
    $result = implode('', $digits);

    // Return the final string with dashes inserted between odd numbers
    return $result;
}

// Test vectors for the DashInsert function
$testCases = [454793, 99946, 56730];

// Execute the test vectors using the function and display results
foreach ($testCases as $testCase) {
    echo "Test Vector: '{$testCase}':" . PHP_EOL;
    echo "Output: " . DashInsert($testCase) . PHP_EOL;
}

?>

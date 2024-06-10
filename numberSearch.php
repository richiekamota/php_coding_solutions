<?php
/*
Developer: Mirza S. Baig

Date: 6-07-2014

Description: Using the PHP language, have the function NumberSearch(str) take the
             str parameter, search for all the numbers in the string, add them
             together, then return that final number divided by the total amount of
             letters in the string. For example: if str is
             "Hello6 9World 2, Nic8e D7ay!" the output should be 2. First if you
             add up all the numbers, 6 + 9 + 2 + 8 + 7 you get 32. Then there are
             17 letters in the string. 32 / 17 = 1.882, and the final answer should
             be rounded to the nearest whole number, so the answer is 2. Only
             single digit numbers separated by spaces will be used throughout the
             whole string (So this won't ever be the case: hello44444 world). Each
             string will also have at least one letter.
*/

// Create and store all test vectors in an array.
$vectors = array(
    "Hello6 9World 2, Nic8e D7ay!",
    "H3ello9-9",
    "One Number*1*"
);

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '" . $vector . "':" . PHP_EOL;
    echo "Output:" . " " . NumberSearch($vector) . PHP_EOL;
}

function NumberSearch($str) {
    // Find all numbers in the string and store them in an array.
    preg_match_all('/\d/', $str, $matches_number);

    // Find all letters (alphabets) in the string and store them in an array.
    preg_match_all('/[a-zA-Z]/', $str, $matches_alphabet);

    // Check if numbers were found in the string.
    if (!empty($matches_number[0])) {
        $sum_of_numbers = array_sum($matches_number[0]); // Calculate the sum of numbers
        $count_of_letters = count($matches_alphabet[0]); // Count the number of letters

        if ($count_of_letters > 0) {
            // Calculate the result as sum of numbers divided by count of letters
            $result = $sum_of_numbers / $count_of_letters;
            // Round the result to the nearest whole number
            return round($result);
        }
    }

    return "0"; // Default return value if no calculation is possible
}
?>

<?php
/*
This function takes a string $str as input.
It splits the input string into an array of words using space ' ' as the delimiter.
Then, it loops through each word in the array.
For each word, it uses ucfirst() to capitalize the first character.
The capitalized word is appended to a result string along with a space ' ' for separation.
Finally, the function trims any extra spaces from the end of the result string and returns the modified string.
*/
function LetterCapitalize($str) {
    // Split the input string into an array of words using space as the delimiter
    $words = explode(' ', $str);

    // Initialize an empty string to store the modified string
    $result = '';

    // Loop through each word in the array
    foreach ($words as $word) {
        // Capitalize the first character of each word
        $capitalizedWord = ucfirst($word);

        // Append the capitalized word to the result string with a space
        $result .= $capitalizedWord . ' ';
    }

    // Trim any extra spaces from the end of the result string
    $result = trim($result);

    // Return the modified string
    return $result;
}

// Test vectors
$vectors = array("hello world", "i ran there");

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '{$vector}':" . PHP_EOL;
    echo "Output: " . LetterCapitalize($vector) . PHP_EOL;
}

?>
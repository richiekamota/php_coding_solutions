<?php

/*
The refactored code provided implements a function called SimpleSymbols 
that checks whether the letters in a given string are surrounded by '+' characters
*/
function SimpleSymbols($str) {
    // Initialize a flag variable to false
    $flag = false;

    // Check if the string starts and ends with a letter
    if (preg_match('/^[a-zA-Z]/', $str) && preg_match('/[a-zA-Z]$/', $str)) {
        // Find all letters in the string
        preg_match_all('/[A-Za-z]/', $str, $letters);

        // Iterate through each letter found
        foreach ($letters[0] as $letter) {
            // Get the position of the current letter in the string
            $pos = strpos($str, $letter);

            // Check if the character before and after the letter is '+'
            if ($str[$pos - 1] == '+' && $str[$pos + 1] == '+') {
                // Set flag to true if the pattern is matched for the current letter
                $flag = true;
            } else {
                // Set flag to false and break the loop if the pattern is not matched
                $flag = false;
                break;
            }
        }
    }

    // Return the final boolean value as a string
    return $flag ? "true" : "false";
}

// Define test vectors
$vectors = ["+d+=3=+s+", "f++d+"];

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '{$vector}':" . PHP_EOL;
    echo "Output: " . SimpleSymbols($vector) . PHP_EOL;
}
?>

<?php
/*
Developer: Mirza S. Baig

Date: 2-12-2014

Description: Using the PHP language, have the function LetterCountI(str) take the str
             parameter being passed and return the first word with the greatest number
             of repeated letters. For example: "Today, is the greatest day ever!"
             should return greatest because it has 2 e's (and 2 t's) and it comes
             before ever which also has 2 e's. If there are no words with repeating
             letters return -1. Words will be separated by spaces.
*/

function LetterCountI($str) {
    // Split the input string into an array of words
    $words = explode(" ", $str);

    // Initialize variables to keep track of the word with the most repeated characters
    $wordWithMaxRepeats = -1;
    $maxRepeatCount = 0;

    // Iterate through each word in the array
    foreach ($words as $word) {
        // Count the frequency of each character in the word
        $charCounts = array_count_values(str_split($word));

        // Find the highest frequency of any character in the word
        $currentMaxRepeat = max($charCounts);

        // Update the word with the most repeated characters if applicable
        if ($currentMaxRepeat > $maxRepeatCount) {
            $maxRepeatCount = $currentMaxRepeat;
            $wordWithMaxRepeats = $word;
        }
    }

    // Return the word with the most repeated characters if found, otherwise -1
    return ($maxRepeatCount > 1) ? $wordWithMaxRepeats : -1;
}

// Define test vectors
$vectors = ["Today, is the greatest day ever", "Hello apple pie", "No words"];

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '" . $vector . "':" . PHP_EOL;
    echo "Output: " . LetterCountI($vector) . PHP_EOL;
}
?>

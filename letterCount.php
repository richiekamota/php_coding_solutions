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
    // Split the string into an array of words
    $words = explode(" ", $str);

    // Initialize variables to track the word with the most repeated characters
    $maxWord = "-1";
    $maxRepeatCount = 0;

    // Iterate through each word in the array
    foreach ($words as $word) {
        // Count the frequency of each character in the word
        $charCounts = array_count_values(str_split($word));

        // Find the maximum count of repeated characters in the word
        $maxCount = max($charCounts);

        // Check if the word has more repeated characters than the current maximum
        if ($maxCount > $maxRepeatCount) {
            $maxRepeatCount = $maxCount;
            $maxWord = $word;
        }
    }

    // Return the word with the most repeated characters, or -1 if no word has repeated characters
    return ($maxWord !== "-1" && $maxRepeatCount > 1) ? $maxWord : -1;
}

// Define test vectors
$vectors = ["Today, is the greatest day ever", "Hello apple pie", "No words"];

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '" . $vector . "':" . PHP_EOL;
    echo "Output: " . LetterCountI($vector) . PHP_EOL;
}
?>

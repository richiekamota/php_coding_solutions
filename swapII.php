<?php
/*

Developer: Mirza S. Baig

Date: 5-27-2014

Description:    Using the PHP language, have the function SwapII(str) take the str
                parameter and swap the case of each character. Then, if a letter is
                between two numbers (without separation), switch the places of the two
                numbers. For example: if str is "6Hello4 -8World, 7 yes3" the output
                should be 4hELLO6 -8wORLD, 7 YES3.

Notes:          The "swap" function is deprecated. However, this is kept as comments
                for future reference.

*/

// Create and store all test vectors in an array
$vectors = array("6Hello4 -8World, 7 yes3", "Hello -5LOL6", "2S 6 du5d4e");

// Execute the test vectors using the function and display results
foreach ($vectors as $vector) {
    echo "Test Vector: '" . $vector . "':" . PHP_EOL;
    echo "Output:" . " " . SwapII($vector) . PHP_EOL;
}

function SwapII($str) {
    // Split the given string into an array of words
    $arr = explode(" ", $str);

    // Iterate through each word in the array
    foreach ($arr as &$word) {
        // Swap case for each character in the word
        $word = swapCase($word);

        // Find positions of digits in the word
        $digitPositions = array();
        preg_match_all('/\d/', $word, $digitPositions, PREG_OFFSET_CAPTURE);

        // If more than one digit is found in the word and they are adjacent
        if (count($digitPositions[0]) > 1 && ($digitPositions[0][1][1] === $digitPositions[0][0][1] + 1)) {
            // Swap the positions of the two digits
            $temp = $word[$digitPositions[0][0][1]];
            $word[$digitPositions[0][0][1]] = $word[$digitPositions[0][1][1]];
            $word[$digitPositions[0][1][1]] = $temp;
        }
    }

    // Return the modified string by joining the words back into a single string
    return implode(" ", $arr);
}

function swapCase($str) {
    // Callback function to swap case of each character in a string
    return preg_replace_callback('/[a-zA-Z]/', function($match) {
        return ctype_upper($match[0]) ? strtolower($match[0]) : strtoupper($match[0]);
    }, $str);
}

?>

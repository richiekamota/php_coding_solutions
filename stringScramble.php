<?php
/*
Developer: Mirza S. Baig

Date: 4-13-2014

Description:    Using the PHP language, have the function StringScramble(str1,str2)
                take both parameters being passed and return the string true if a
                portion of str1 characters can be rearranged to match str2, otherwise
                return the string false. For example: if str1 is "rkqodlw" and str2 is
                "world" the output should return true. Punctuation and symbols will
                not be entered with the parameters.

*/

// Store all test vectors in an array
$vectors = array(array("rkqodlw", "world"), array("cdore", "coder"), array("h3llko", "hello"));

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    // Format the test vector for display
    $vectorString = "'" . implode("', '", $vector) . "'"; // Enclose each element in quotes
    echo "Test Vector: [{$vectorString}]:" . PHP_EOL;
    echo "Output: " . StringScramble($vector[0], $vector[1]) . PHP_EOL;
}

function StringScramble($str1, $str2) {
    // Convert strings to arrays of characters
    $arr1 = str_split($str1);
    $arr2 = str_split($str2);

    // Count occurrences of each character in str1
    $counts1 = array_count_values($arr1);
    // Count occurrences of each character in str2
    $counts2 = array_count_values($arr2);

    // Compare character counts in str1 and str2
    foreach ($counts2 as $char => $count) {
        if (!isset($counts1[$char]) || $counts1[$char] < $count) {
            return "false";
        }
    }

    // All characters in str2 can be formed from str1
    return "true";
}

?>

<?php
/*
Developer: Mirza S. Baig

Date: 6-13-2014

Description: Using the PHP language, have the function StringReduction(str) take
             the str parameter being passed and return the smallest number you can
             get through the following reduction method. The method is: Only the
             letters a, b, and c will be given in str and you must take two
             different adjacent characters and replace it with the third.
             For example "ac" can be replaced with "b" but "aa" cannot be replaced
             with anything. This method is done repeatedly until the string cannot
             be further reduced, and the length of the resulting string is to be
             outputted. For example: if str is "cab", "ca" can be reduced to "b"
             and you get "bb" (you can also reduce it to "cc"). The reduction is
             done so the output should be 2. If str is "bcab", "bc" reduces to "a",
             so you have "aab", then "ab" reduces to "c", and the final string "ac"
             is reduced to "b" so the output should be 1.
*/

// Create and store all test vectors in an array.
$vectors = array("cab", "bcab", "abcabc", "cccc");

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '{$vector}':" . PHP_EOL;
    echo "Output: " . StringReduction($vector) . PHP_EOL;
}

function StringReduction($str) {
    while (canReduce($str)) {
        $str = reduceString($str);
    }
    return strlen($str);
}

function canReduce($str) {
    // Check if the string contains reducible pairs
    return preg_match('/ab|ba|bc|cb|ac|ca/', $str);
}

function reduceString($str) {
    // Define reduction rules
    $replacements = array(
        'ab' => 'c',
        'ba' => 'c',
        'bc' => 'a',
        'cb' => 'a',
        'ac' => 'b',
        'ca' => 'b'
    );

    // Replace the first occurrence of any reducible pair
    foreach ($replacements as $pair => $replacement) {
        if (strpos($str, $pair) !== false) {
            return str_replace($pair, $replacement, $str);
        }
    }

    // If no reduction can be made, return the string as is
    return $str;
}

?>

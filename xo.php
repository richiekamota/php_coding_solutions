<?php
/*
Developer: Mirza S. Baig

Date: 1-30-2014

Description: Using the PHP language, have the function ExOh(str) take the 
str parameter being passed and return the string true if there is an equal number of x's 
and o's, otherwise return the string false. Only these two letters will be entered in the 
string, no punctuation or numbers. For example: if str is "xooxxxxooxo" 
then the output should return false because there are 6 x's and 5 o's.
*/

function ExOh($str) {  
    // Count occurrences of 'x' and 'o' in the string
    $countX = substr_count($str, 'x');
    $countO = substr_count($str, 'o');
    
    // Check if counts of 'x' and 'o' are equal
    $result = ($countX == $countO) ? "true" : "false";
    
    return $result; 
}

// Store all test vectors in an array
$vectors = array("xooxxo", "x", "xo");

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '{$vector}':<br>";
    echo "Output: " . ExOh($vector) . "<br><br>";
}
?>

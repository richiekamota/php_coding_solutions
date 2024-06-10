<?php
/*
Developer: Mirza S. Baig

Date: 3-26-2014

Description:    Using the PHP language, have the function PalindromeTwo(str) take the
                str parameter being passed and return the string true if the parameter
                is a palindrome, (the string is the same forward as it is backward)
                otherwise return the string false. The parameter entered may have
                punctuation and symbols but they should not affect whether the string
                is in fact a palindrome. For example: "Anne, I vote more cars race
                Rome-to-Vienna" should return true.

*/

function PalindromeTwo($str) {
    // Remove non-alphanumeric characters and convert to lowercase
    $cleanStr = preg_replace('/[^A-Za-z0-9]/', '', $str);
    $cleanStr = strtolower($cleanStr);
    
    // Check if the cleaned string is a palindrome
    $isPalindrome = ($cleanStr === strrev($cleanStr));
    
    // Return "true" or "false" based on palindrome check
    return $isPalindrome ? "true" : "false";
}

// Store all test vectors in an array
$vectors = array("Noel - sees Leon", "A war at Tarawa!", "Anne, I vote more cars race Rome-to-Vienna");
	
// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '". $vector . "':" . PHP_EOL;
    echo "Output:" . " " . PalindromeTwo($vector). PHP_EOL;
}
?>

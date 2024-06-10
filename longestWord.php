<?php 

function LongestWord($sen) { 
    // Split the input sentence into an array of words
    $words = explode(" ", $sen);
    
    // Initialize a variable to store the longest word
    $longestWord = "";
    
    // Iterate through each word in the array
    foreach ($words as $word) {
        // Check if the current word is longer than the current longest word
        if (strlen($word) > strlen($longestWord)) {
            // Update the longest word if the current word is longer
            $longestWord = $word;
        }
    }
    
    // Return the longest word found in the sentence
    return $longestWord; 
}

// Test vectors
$vectors = array("fun&!! time", "I love dogs");

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '{$vector}':" . PHP_EOL;
    echo "Output: " . LongestWord($vector) . PHP_EOL;
}

?>
<?php 

function LetterChanges($str) {
    // Define a mapping array for vowels to convert them to uppercase
    $vowelMap = array('a' => 'A', 'e' => 'E', 'i' => 'I', 'o' => 'O', 'u' => 'U');

    // Initialize an empty result string
    $result = '';

    // Loop through each character in the input string
    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];

        // Check if the current character is a letter
        if (ctype_alpha($char)) {
            // Increment the ASCII value of the character
            $nextChar = chr(ord($char) + 1);

            // Handle wrap-around from 'z' to 'a' and 'Z' to 'A'
            if ($char == 'z') {
                $nextChar = 'a';
            } elseif ($char == 'Z') {
                $nextChar = 'A';
            }

            // Convert vowels to uppercase if the next character is a vowel
            if (isset($vowelMap[strtolower($nextChar)])) {
                $nextChar = $vowelMap[strtolower($nextChar)];
            }

            // Append the modified character to the result string
            $result .= $nextChar;
        } else {
            // Append non-alphabet characters as they are
            $result .= $char;
        }
    }

    // Return the final modified string
    return $result;
}

// Test vectors
$vectors = array("hello*3", "fun times!");

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: '{$vector}':" . PHP_EOL;
    echo "Output: " . LetterChanges($vector) . PHP_EOL;
}
?>
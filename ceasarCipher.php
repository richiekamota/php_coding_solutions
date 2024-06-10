<?php

/*Description:    Using the PHP language, have the function CaesarCipher(str,num) take
 *              the str parameter and perform a Caesar Cipher shift on it using the
 *              num parameter as the shifting number. A Caesar Cipher works by
 *              shifting each letter in the string N places down in the alphabet
 *              (in this case N will be num). Punctuation, spaces, and capitalization
 *              should remain intact. For example if the string is "Caesar Cipher" and
 *              num is 2 the output should be "Ecguct Ekrjgt".
 */
    /**
 * Caesar Cipher implementation in PHP.
 *
 * @param string $str The string to be encrypted.
 * @param int $num The shift value for the Caesar Cipher.
 * @return string The encrypted string using the Caesar Cipher.
 */
function CaesarCipher($str, $num) {
    // Split the input string into an array of characters
    $chars = str_split($str);

    // Apply Caesar Cipher encryption to each character in the array
    for ($i = 0; $i < count($chars); $i++) {
        // Encrypt the current character using the specified shift value
        $chars[$i] = shiftCharacter($chars[$i], $num);
    }

    // Join the encrypted characters back into a string and return the result
    return implode('', $chars);
}

/**
 * Helper function to shift a single character based on the Caesar Cipher shift value.
 *
 * @param string $char The character to be shifted.
 * @param int $num The shift value for the Caesar Cipher.
 * @return string The shifted character.
 */
function shiftCharacter($char, $num) {
    // Determine the range of characters ('A' to 'Z' for uppercase, 'a' to 'z' for lowercase)
    $start = ord(ctype_upper($char) ? 'A' : 'a');
    $end = ord(ctype_upper($char) ? 'Z' : 'z');

    // Calculate the shifted position of the character
    $shifted = ord($char) + $num;

    // Wrap around the alphabet if necessary
    if ($shifted > $end) {
        $shifted = $start + ($shifted - $end - 1) % 26;
    }

    // Return the shifted character
    return chr($shifted);
}

// Test vectors for the CaesarCipher function
$testCases = array(
    array("Hello", 4),
    array("abc", 0),
    array("Caesar Cipher", 2)
);

// Execute the test vectors using the function and display results
foreach ($testCases as $vector) {
    $inputStr = $vector[0];
    $shiftNum = $vector[1];

    echo "Test Vector: '{$inputStr}', Shift: {$shiftNum}" . PHP_EOL;
    echo "Output: " . CaesarCipher($inputStr, $shiftNum) . PHP_EOL;
}

?>
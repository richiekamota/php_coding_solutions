<?php
/*
Developer: Mirza S. Baig

Date: 4-23-2014

Description:    Using the PHP language, have the function FormattedDivision(num1,num2)
                take both parameters being passed, divide num1 by num2, and return the
                result as a string with properly formatted commas and rounded to four
                decimal places. For example: if num1 is 123456789 and num2 is 10000,
                the output should be "12,345.6789".

*/

// Store all test vectors in an array
$vectors = array(array(123456789, 10000), array(2, 3), array(10, 10));

// Execute the test vectors using the function and display results
foreach ($vectors as $vector) {
    echo "Test Vector: '" . implode(" , ", $vector) . "':" . PHP_EOL;
    echo "Output:" . " " . FormattedDivision($vector[0], $vector[1]) . PHP_EOL;
}

function FormattedDivision($num1, $num2) {
    // Perform division and format the result to four decimal places with commas
    $result = number_format(($num1 / $num2), 4);

    return $result;
}
?>

<?php
/*
Developer: Mirza S. Baig

Date: 1-31-2014

Description: Using the PHP language, have the function ArithGeo(arr) take the array of numbers stored in arr 
and return the string "Arithmetic" if the sequence follows an arithmetic pattern or return "Geometric" if 
it follows a geometric pattern. If the sequence doesn't follow either pattern return -1. An arithmetic 
sequence is one where the difference between each of the numbers is consistent, whereas in a geometric sequence, 
each term after the first is multiplied by some constant or common ratio. Negative numbers may be entered as parameters, 
0 will not be entered, and no array will contain all the same elements.
*/

function ArithGeo($arr) {
    // Check if array length is less than 2 (invalid for pattern check)
    if (count($arr) < 2) {
        return -1;
    }
    
    $diff = $arr[1] - $arr[0];
    $ratio = $arr[1] / $arr[0];
    $isArithmetic = true;
    $isGeometric = true;
    
    // Check for arithmetic and geometric sequences
    for ($i = 2; $i < count($arr); $i++) {
        if ($arr[$i] != $arr[$i - 1] + $diff) {
            $isArithmetic = false;
        }
        if ($arr[$i] != $arr[$i - 1] * $ratio) {
            $isGeometric = false;
        }
    }
    
    // Determine result based on identified pattern
    if ($isArithmetic) {
        return "Arithmetic";
    } elseif ($isGeometric) {
        return "Geometric";
    } else {
        return -1;
    }
}

// Define test vectors
$arr1 = array(5, 10, 15);
$arr2 = array(2, 4, 6, 8);
$arr3 = array(2, 6, 18, 54);
$arr4 = array(2, 4, 16, 24);

// Store test vectors in an array
$vectors = array($arr1, $arr2, $arr3, $arr4);

// Execute the test vectors using the function
foreach ($vectors as $vector) {
    echo "Test Vector: [" . implode(", ", $vector) . "]<br>";
    echo "Output: " . ArithGeo($vector) . "<br><br>";
}
?>

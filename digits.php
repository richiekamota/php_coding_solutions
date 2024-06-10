<?php 
function findDecreasingDigit($arr) {
    $digits = str_split($arr);
    $length = count($digits);
    for ($i = $length - 1; $i > 0; $i--) {
        if ($digits[$i] > $digits[$i - 1]) {
            return $i - 1;
        }
    }
    return false;
}

function findSmallestToRight($digits, $index) {
    $digits = str_split($digits);
    $smallest = $index + 1;
    for ($i = $index + 2; $i < count($digits); $i++) {
        if ($digits[$i] > $digits[$index] && $digits[$i] < $digits[$smallest]) {
            $smallest = $i;
        }
    }
    return $smallest;
}

$input = "11121";
$index = findDecreasingDigit($input);
echo findDecreasingDigit($input).PHP_EOL;
echo findSmallestToRight($input,$index);
?>
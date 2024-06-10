<?php 
/*
Have the function BracketCombinations(num) read num which will be an integer greater than or equal to zero,
and return the number of valid combinations that can be formed with num pairs of parentheses. 
For example, if the input is 3, then the possible combinations of 3 pairs of parenthesis, 
namely ()()() are ()()(),()(()),(())(),((())) and (()()).
There are 5 total combinations when the input is 3, so your program should return 5.
*/
function BracketCombinations($num) {
    if ($num <= 0) {
        return 0;
    }
    
    $result = 0;
    generateCombinations('', 0, 0, $num, $result);
    return $result;
}

function generateCombinations($current, $open, $close, $max, &$result) {
    if (strlen($current) == $max * 2) {
        if ($open == $close) {
            $result++;
        }
        return;
    }
    
    if ($open < $max) {
        generateCombinations($current.'(', $open + 1, $close, $max, $result);
    }
    
    if ($close < $open) {
        generateCombinations($current.')', $open, $close + 1, $max, $result);
    }
}

echo BracketCombinations(2); // Output: 5

?>
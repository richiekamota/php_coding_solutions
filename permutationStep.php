<?php
/*
Developer: Mirza S. Baig
Date: 5-6-2014
Description: Using PHP, the function PermutationStep(num) takes
the num parameter and returns the next number greater than
num using the same digits. For example, if num is 123, return 132.
If it's 12453, return 12534. If a number has no greater permutations,
return -1 (i.e., 999).
*/

// Create and store all test vectors in an array.
$vectors = array(123, 12453, 11121, 41352, 999);

// Execute the test vectors using the function.
foreach ($vectors as $vector) {
    echo "Test Vector: '" . $vector . "':" . PHP_EOL;
    echo "Output:" . " " . PermutationStep($vector) . PHP_EOL;
}

function PermutationStep($num) {
    // Split the number into an array.
    $arr = str_split($num);

    // Check if all the digits in the argument are the same. If so, return -1.
    if (count(array_count_values($arr)) == 1) {
        return "-1";
    }

    // Generate all permutations of the digits.
    $arr_permutations = permute($arr);

    // Sort the permutations.
    sort($arr_permutations);

    // Find the smallest permutation greater than the input number.
    foreach ($arr_permutations as $permutation) {
        if ($permutation > $num) {
            return $permutation;
        }
    }

    return "-1";
}

// Function to generate all permutations of an array of digits.
function permute($arr) {
    $arr_permutations = array();
    $count = count($arr);

    while (true) {
        $arr_permutations[] = implode("", $arr);

        $i = $count - 1;
        while ($i > 0 && $arr[$i - 1] >= $arr[$i]) {
            $i--;
        }

        if ($i <= 0) {
            break;
        }

        $j = $count - 1;
        while ($arr[$j] <= $arr[$i - 1]) {
            $j--;
        }

        // Swap the elements.
        $temp = $arr[$i - 1];
        $arr[$i - 1] = $arr[$j];
        $arr[$j] = $temp;

        // Reverse the suffix.
        $j = $count - 1;
        while ($i < $j) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
            $i++;
            $j--;
        }
    }

    return $arr_permutations;
}
?>

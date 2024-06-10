<?php

function PrimeChecker($num) {
    $arr = str_split($num);
    $arr_permutations = generatePermutations($arr);

    foreach ($arr_permutations as $permutation) {
        if (isPrime($permutation)) {
            return "1";
        }
    }

    return "0";
}

function generatePermutations($arr) {
    $arr_permutations = permute($arr);

    return array_map(function ($permutation) {
        return implode('', $permutation);
    }, $arr_permutations);
}

function permute($arr) {
    $arr_permutations = [];
    $count = count($arr);

    while (true) {
        $arr_permutations[] = $arr;

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

        // Swap the positions of the numbers without using a separate swap method.
        $temp = $arr[$i - 1];
        $arr[$i - 1] = $arr[$j];
        $arr[$j] = $temp;

        $j = $count - 1;
        while ($i < $j) {
            // Swap the positions of the numbers without using a separate swap method.
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
            $i++;
            $j--;
        }
    }

    return $arr_permutations;
}

function isPrime($num) {
    if ($num == 2) {
        return true;
    }

    for ($i = 2; $i <= ceil(sqrt($num)); $i++) {
        if ($i != $num && $num % $i == 0) {
            return false;
        }
    }

    return true;
}

// Example usage:
$num = "113";
$result = PrimeChecker($num);
echo "Result: $result";

?>

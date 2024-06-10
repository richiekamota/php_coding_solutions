<?php

function largestPermutation($num) {
    $arr = str_split($num);
    if (array_count_values($arr) == 1) {
        return false;
    }

    $arr_permutations = permute($arr);
    rsort($arr_permutations);
    
    return $arr_permutations[0];
}

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

        $temp = $arr[$i - 1];
        $arr[$i - 1] = $arr[$j];
        $arr[$j] = $temp;

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

$vectors = array("1324", "2136", "8123");

foreach ($vectors as $vector) {
    echo "Test vector:" . $vector . PHP_EOL;
    echo largestPermutation($vector) . PHP_EOL;
}

?>

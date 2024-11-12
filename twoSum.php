<?php

function two_sum($nums, $target)
{
    $num_map = [];
    foreach ($nums as $index => $num) {
        $complement = $target - $num;
        if (isset($num_map[$complement])) {
            return [$num_map[$complement], $index];
        }
        $num_map[$num] = $index;
    }
    return null;
}

$nums = [2, 6, 9, 1, 3];
$target = 15;
$indices = two_sum($nums, $target);

if ($indices !== null) {
    echo "The sum of " . $target . " is " . $nums[$indices[0]] . " and " . $nums[$indices[1]];
} else {
    echo "There are no two numbers adding up to the target";
}
?>

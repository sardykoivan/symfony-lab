<?php

function binary_search(int $target, array $arr): int {
    $left = 0;
    $right = count($arr) - 1;

    while ($left <= $right) {
        $mid = intdiv($left + $right, 2);
        if ($arr[$mid] === $target) {
            return $arr[$mid];
        } elseif ($target < $mid) {
            $right = $mid - 1;
        } else {
            $left = $mid + 1;
        }
    }

    return -1;
}

$arr = [10, 20, 30, 40, 50];

echo binary_search(40, $arr);


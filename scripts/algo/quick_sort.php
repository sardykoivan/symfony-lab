<?php

$arr = [4, -1, 10, 2, 5];

/**
 * Быстрая сортировка
 *
 * определяем выход - когда 1 элемент
 * определяем центр
 * все что слева и справа рекурсивно сортируем
 * объединяем массив
 */
function quick_sort(array $arr): array
{
    if (count($arr) < 2) {
        return $arr;
    }

    $first = $arr[0];
    $left = [];
    $right = [];

    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $first) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }

    return array_merge(quick_sort($left), [$first], quick_sort($right));
}

var_dump(quick_sort($arr));
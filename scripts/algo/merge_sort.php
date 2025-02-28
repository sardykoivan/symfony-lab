<?php

function mergeSort(array $arr): array {
    // Если в массиве 1 или 0 элементов, он уже отсортирован, возвращаем его
    if (count($arr) < 2) {
        return $arr;
    }

    // Разделяем массив на две половины
    $mid = intdiv(count($arr), 2);
    $left = array_slice($arr, 0, $mid);  // Левая часть
    $right = array_slice($arr, $mid);   // Правая часть

    // Рекурсивно сортируем обе половины
    $sortedLeft = mergeSort($left);
    $sortedRight = mergeSort($right);

    // Объединяем отсортированные части
    return merge($sortedLeft, $sortedRight);
}
function merge(array $left, array $right): array {
    $sorted = []; // Результат
    $i = $j = 0; // Два указателя: $i для $left, $j для $right

    // Пока есть элементы в обоих массивах
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] <= $right[$j]) {
            $sorted[] = $left[$i]; // Берем элемент из $left
            $i++; // Двигаем указатель $i вправо
        } else {
            $sorted[] = $right[$j]; // Берем элемент из $right
            $j++; // Двигаем указатель $j вправо
        }
    }

    // Если в $left остались элементы, добавляем их в $sorted
    while ($i < count($left)) {
        $sorted[] = $left[$i];
        $i++;
    }

    // Если в $right остались элементы, добавляем их в $sorted
    while ($j < count($right)) {
        $sorted[] = $right[$j];
        $j++;
    }

    return $sorted; // Возвращаем итоговый отсортированный массив
}

$arr = [5, -1, 3, 0, 7, 2, 4];

var_dump(mergeSort($arr));
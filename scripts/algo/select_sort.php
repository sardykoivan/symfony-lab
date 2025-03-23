<?php

/**
 * selection sort
 *
 * поиск минимального элемента и поиск в оставшейся части
 *
 */
function selectionSort(array $arr): array {
    $n = count($arr);

    for ($i = 0; $i < $n - 1; $i++) {
        // Считаем текущий элемент минимальным
        $minIndex = $i;

        // Ищем индекс реального минимума в оставшейся части
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }

        // Если нашли элемент меньше, чем $arr[$i], меняем их
        if ($minIndex !== $i) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$minIndex];
            $arr[$minIndex] = $temp;
        }
    }

    return $arr;
}

// Пример использования
$array = [64, 25, 12, 22, 11];
echo "Исходный массив:\n";
print_r($array);
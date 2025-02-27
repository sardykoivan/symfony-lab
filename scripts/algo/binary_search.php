<?php

final class BinarySearcher
{
    private static int $i = 0;

    public static function iterationCount(): int
    {
        return self::$i;
    }

    public function search(array $arr, int $target): int
    {
        $left = 0;
        $right = count($arr) - 1;

        self::$i = 0;

        while ($left <= $right) {
            self::$i++;
            $mid = (int)(($left + $right) / 2);

            if ($arr[$mid] === $target) {
                return $mid;
            }
            elseif ($arr[$mid] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }


        return -1;
    }
}

$arr = range(1,100);
$target = 4;

$binarySearcher = new BinarySearcher();

$result = $binarySearcher->search($arr, 4);
echo 'Искомый элемент находится под индексом ' . $result . '. Количество итераций ' . BinarySearcher::iterationCount();


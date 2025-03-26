<?php

// https://leetcode.com/problems/two-sum/

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $map = [];

        foreach ($nums as $i => $num) {
            $targetNum = $target - $num;

            if (isset($map[$targetNum]) && $map[$targetNum] !== $i) {
                return [$i, $map[$targetNum]];
            }

            $map[$num] = $i;
        }

        return null;
    }
}
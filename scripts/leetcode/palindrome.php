<?php

// https://leetcode.com/problems/palindrome-number/

class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        if ($x < 0) {
            return false;
        }

        $digits = (string) $x;
        $length = strlen($digits);
        for ($i = 0; $i < $length / 2; $i++) {
            if ($digits[$i] !== $digits[$length - 1 - $i]) {
                return false;
            }
        }

        return true;
    }
}
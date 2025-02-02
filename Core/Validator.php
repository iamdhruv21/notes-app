<?php

    namespace Core;
    class Validator
    {
        public static function string($value, $min = 1, $max = INF): bool
        {
            $value = trim($value);

            return strlen($value) >= $min && strlen($value) <= $max;
        }

        public static function email($value): string
        {
            return trim($value);

        }
    }
<?php

namespace App\Helpers;

class Env
{
    public static function getenv(string $key, $default = null)
    {
        $value = $_ENV[$key] ?? '';

        if ($value == false) {
            return $default;
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;

            case 'false':
            case '(false)':
                return false;

            case 'empty':
            case '(empty)':
                return '';

            case 'null':
            case '(null)':
                return;
        }

        if (str_starts_with($value, '"') && str_ends_with($value, '"')) {
            return substr($value, 1, -1);
        }

        return $value;
    }

    public static function getconfig(string $string): string | array
    {
        $lst = explode('.', $string);
        $conf = include CONFIG_PATH . "/{$lst[0]}.php";

        array_shift($lst);

        $getArrayPath = function (array $array, array $initial) {
            $callback = function (array $xs, $x) {
                return (array_key_exists($x, $xs)) ? $xs[$x] : null;
            };
            return array_reduce($array, $callback, $initial);
        };

        return $getArrayPath($lst, $conf);
    }
}

<?php

namespace App\Helpers;

class Arr
{
    public static function assignArrayByPath(array &$array, string $path, mixed $value, string $separator = '.'): void
    {
        $keys = explode($separator, $path);

        foreach ($keys as $key) {
            $array = &$array[$key];
        }

        $array = $value;
    }

    public static function getArrayByPath(array &$array, string $path, string $separator = '.'): mixed
    {
        $keys = explode($separator, $path);

        foreach ($keys as $key) {
            $array = &$array[$key];
        }

        return $array;
    }

    public static function unsetArrayByPath(array &$array, string $path, string $separator = '.'): void
    {
        $keys = explode($separator, $path);
        $length = count($keys);

        foreach ($keys as $i => $key) {
            if ($i === $length - 1) {
                unset($array[$key]);
            } else {
                $array = &$array[$key];
            }
        }
    }
}
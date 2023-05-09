<?php

namespace App\Helpers;

class Dot
{
    public static function set(array &$array, string $path, mixed $value, string $separator = '.'): void
    {
        $keys = explode($separator, $path);

        foreach ($keys as $key) {
            if (!isset($array[$key]) || !is_array($array[$key])) {
                $array[$key] = [];
            }

            $array = &$array[$key];
        }

        $array = $value;
    }

    public static function get(array $array, string $path, string $separator = '.'): mixed
    {
        if (empty($path)) {
            return $array;
        }

        $keys = explode($separator, $path);

        foreach ($keys as $key) {
            if (!isset($array[$key]) || !is_array($array)) {
                return null;
            }

            $array = $array[$key];
        }

        return $array;
    }

    public static function has(array $array, string $path, string $separator = '.'): bool
    {
        $value = self::get($array, $path, $separator);

        return isset($value);
    }

    public static function del(array &$array, string $path, string $separator = '.'): void
    {
        $keys = explode($separator, $path);
        $length = count($keys);

        foreach ($keys as $idx => $key) {
            if ($idx === $length - 1) {
                unset($array[$key]);
            } else {
                $array = &$array[$key];
            }
        }
    }
}

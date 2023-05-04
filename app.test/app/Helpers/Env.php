<?php

namespace App\Helpers;

class Env
{
    public static function env(string $key, mixed $default = null): mixed
    {
        $value = $_ENV[$key] ?? '';

        if (false == $value) {
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
                return null;
        }

        if (str_starts_with($value, '"') && str_ends_with($value, '"')) {
            return substr($value, 1, -1);
        }

        return $value;
    }

    public static function config(string $string, mixed $default = null): mixed
    {
        $path = explode('.', $string);
        $key = implode('.', array_slice($path, 1));
        $conf = include CONFIG_PATH."/{$path[0]}.php";

        return dot($conf)->get($key, $default);
    }
}

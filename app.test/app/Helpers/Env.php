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

    public static function config(string $path, mixed $default = null): mixed
    {
        $keys = explode('.', $path);
        $key = implode('.', array_slice($keys, 1));
        $conf = include CONFIG_PATH . "/{$keys[0]}.php";

        if (!dot()->has($conf, $key)) {
            dot()->set($conf, $key, $default);
        }

        return dot()->get($conf, $key);
    }
}
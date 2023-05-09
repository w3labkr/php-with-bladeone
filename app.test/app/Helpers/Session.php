<?php

namespace App\Helpers;

class Session
{
    public static function set(string $path, mixed $value, string $separator = '.'): void
    {
        Dot::set($_SESSION, $path, $value, $separator);
    }

    public static function get(string $path, string $separator = '.'): mixed
    {
        return Dot::get($_SESSION, $path, $separator);
    }

    public static function has(string $path, string $separator = '.'): bool
    {
        return Dot::has($_SESSION, $path, $separator);
    }

    public static function del(string $path, string $separator = '.'): void
    {
        Dot::del($_SESSION, $path, $separator);
    }
}

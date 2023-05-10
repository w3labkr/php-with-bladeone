<?php

namespace App\Helpers;

class Session
{
    public function set(string $path, mixed $value = null, string $separator = '.'): void
    {
        Dot::set($_SESSION, $path, $value, $separator);
    }

    public function get(string $path, string $separator = '.'): mixed
    {
        return Dot::get($_SESSION, $path, $separator);
    }

    public function has(string $path, string $separator = '.'): bool
    {
        return Dot::has($_SESSION, $path, $separator);
    }

    public function del(string $path, string $separator = '.'): void
    {
        Dot::del($_SESSION, $path, $separator);
    }
}

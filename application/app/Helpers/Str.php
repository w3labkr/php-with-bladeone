<?php

namespace App\Helpers;

class Str
{
    public static function random(int $length = 10): string
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; ++$i) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public static function str_starts_with(string $haystack, string $needle): bool
    {
        return '' !== (string) $needle && 0 === strncmp($haystack, $needle, strlen($needle));
    }

    public static function str_ends_with(string $haystack, string $needle): bool
    {
        return '' !== $needle && substr($haystack, -strlen($needle)) === (string) $needle;
    }

    public static function str_contains(string $haystack, string $needle): bool
    {
        return '' !== $needle && false !== mb_strpos($haystack, $needle);
    }

    public static function substr_replace_offset(string $search, string $replace, int $start = 0, int|null $end = null): string
    {
        $offset = $start;
        $length = $times = strlen($search) - $start - $end;

        return substr_replace($search, str_repeat($replace, $times), $offset, $length);
    }
}

<?php

namespace App\Helpers;

/**
 * https://gist.github.com/alexsasharegan/d8a75d42f63e7d14f1a33ffdd4971e30
 */
class Session
{
    public static function set(string $path, mixed $value, string $separator = '.')
    {
        $session = &$_SESSION;
        $keys = explode($separator, $path);
        $length = count($keys);

        foreach ($keys as $i => $key) {
            $lastKey = $i === $length - 1;
            $isset = isset($session[$key]);

            if ($isset && !$lastKey && !is_array($session[$key])) {
                continue;
            }

            if (!$isset || !is_array($session[$key])) {
                $session[$key] = [];
            }

            $session = &$session[$key];
        }

        $session = $value;
    }

    public static function get(string $path, string $separator = '.'): mixed
    {
        $session = $_SESSION;
        $keys = explode($separator, $path);

        foreach ($keys as $key) {
            if (!is_array($session) || !isset($session[$key])) {
                return null;
            }

            $session = $session[$key];
        }

        return $session;
    }

    public static function del(string $path, string $separator = '.'): void
    {
        $session = &$_SESSION;
        $keys = explode($separator, $path);
        $length = count($keys);

        foreach ($keys as $i => $key) {
            if ($i === $length - 1) {
                unset($session[$key]);
            } else {
                $session = &$session[$key];
            }
        }
    }
}
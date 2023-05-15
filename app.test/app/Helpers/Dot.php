<?php

namespace App\Helpers;

class Dot
{
    public function set(array &$array, string $path, mixed $value = null, string $separator = '.'): void
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

    public function get(array $array, string $path, string $separator = '.'): mixed
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

    public function del(array &$array, string $path, string $separator = '.'): void
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

    public function exists(array $array, string $path, string $separator = '.'): bool
    {
        $value = $this->get($array, $path, $separator);

        return isset($value);
    }

    public function noexists(array $array, string $path, string $separator = '.'): bool
    {
        return !$this->exists($array, $path, $separator);
    }
}

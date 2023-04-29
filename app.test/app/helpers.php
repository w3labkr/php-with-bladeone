<?php

if (!function_exists('env')) {
    function env(string $key, $default = null)
    {
        return \App\Helpers\Env::getenv($key, $default);
    }
}

if (!function_exists('config')) {
    function config(string $string): string|array
    {
        return \App\Helpers\Env::getconfig($string);
    }
}

if (!function_exists('view')) {
    function view(string $template, array $data = [])
    {
        $blade = new \eftec\bladeone\BladeOne(VIEW_PATH, VIEW_CACHE_PATH, \eftec\bladeone\BladeOne::MODE_DEBUG);

        return $blade->run($template, $data);
    }
}

if (!function_exists('encrypt')) {
    function encrypt(string $data): string
    {
        return \App\Helpers\Encrypter::encrypt($data);
    }
}

if (!function_exists('decrypt')) {
    function decrypt(string $data): string
    {
        return \App\Helpers\Encrypter::decrypt($data);
    }
}

if (!function_exists('str_starts_with')) {
    function str_starts_with(string $haystack, string $needle): bool
    {
        return \App\Helpers\Str::str_starts_with($haystack, $needle);
    }
}

if (!function_exists('str_ends_with')) {
    function str_ends_with(string $haystack, string $needle): bool
    {
        return \App\Helpers\Str::str_ends_with($haystack, $needle);
    }
}

if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return \App\Helpers\Str::str_contains($haystack, $needle);
    }
}

if (!function_exists('str_random')) {
    function str_random(int $length = 10): string
    {
        return \App\Helpers\Str::random($length);
    }
}

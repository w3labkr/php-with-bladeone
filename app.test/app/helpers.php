<?php

if (!function_exists('env')) {
    function env(string $key, mixed $default = null): mixed
    {
        return \App\Helpers\Env::env($key, $default);
    }
}

if (!function_exists('config')) {
    function config(string $string, mixed $default = null): mixed
    {
        return \App\Helpers\Env::config($string, $default);
    }
}

if (!function_exists('session')) {
    function session(): Adbar\Dot
    {
        return dot($_SESSION);
    }
}

if (!function_exists('cookie')) {
    function cookie(): Adbar\Dot
    {
        return dot($_COOKIE);
    }
}

if (!function_exists('encrypt')) {
    function encrypt(mixed $data): string
    {
        return \App\Helpers\Encrypter::encrypt($data);
    }
}

if (!function_exists('decrypt')) {
    function decrypt(string $data): mixed
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

if (!function_exists('generate_token')) {
    function generate_token(int $length = 16): string
    {
        return \App\Helpers\Token::generate($length);
    }
}
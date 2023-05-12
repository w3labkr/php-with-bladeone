<?php

if (!function_exists('env')) {
    function env(string $key, mixed $default = null): mixed
    {
        return \App\Helpers\Env::env($key, $default);
    }
}

if (!function_exists('config')) {
    function config(string $path, mixed $default = null): mixed
    {
        return \App\Helpers\Env::config($path, $default);
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

if (!function_exists('generate_token')) {
    function generate_token(int $length = 16): string
    {
        return \App\Helpers\UUID::hex($length);
    }
}

if (!function_exists('uuid4')) {
    function uuid4(): string
    {
        return \App\Helpers\UUID::uuid4();
    }
}

if (!function_exists('bin2uuid4')) {
    function bin2uuid4(string $binary = ''): string
    {
        return \App\Helpers\UUID::bin2uuid4($binary);
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token(string $tokenId = '_token'): void
    {
        \App\Helpers\Blade::csrf_token($tokenId);
    }
}

if (!function_exists('dot')) {
    function dot(): App\Helpers\Dot
    {
        return new \App\Helpers\Dot();
    }
}

if (!function_exists('session')) {
    function session(): App\Helpers\Session
    {
        return new \App\Helpers\Session();
    }
}

if (!function_exists('cookie')) {
    function cookie(string $samesite = ''): App\Helpers\Cookie
    {
        return new \App\Helpers\Cookie($samesite);
    }
}

if (!function_exists('mailer')) {
    function mailer(): App\Helpers\Mailer
    {
        return new \App\Helpers\Mailer();
    }
}

if (!function_exists('substr_replace_offset')) {
    function substr_replace_offset(string $search, string $replace, int $start = 0, int|null $end = null): string
    {
        return \App\Helpers\Str::substr_replace_offset($search, $replace, $start, $end);
    }
}

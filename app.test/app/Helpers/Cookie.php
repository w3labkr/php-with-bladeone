<?php

namespace App\Helpers;

use App\Helpers\Validator;

class Cookie
{
    public static function set(
        string $name,
        string|null $value = '',
        string|int|null $expires_or_options = 0,
        string|null $path = '/',
        string|null $domain = '',
        bool|null $secure = false,
        bool|null $httponly = false
    ): bool {

        $_COOKIE[$name] = $encrypted_value = encrypt($value);

        $expires_or_options = is_string($expires_or_options) ? strtotime($expires_or_options) : $expires_or_options;

        return setcookie($name, $encrypted_value, $expires_or_options, $path, $domain, $secure, $httponly);
    }

    public static function get(string $name): mixed
    {
        if (!isset($_COOKIE[$name])) {
            return null;
        }

        $value = $_COOKIE[$name];
        $decrypted_value = decrypt($value);

        return Validator::safe($decrypted_value);
    }

    public static function del(
        string $name,
        string|null $value = '',
        string|int|null $expires_or_options = 1,
        string|null $path = '/',
        string|null $domain = '',
        bool|null $secure = false,
        bool|null $httponly = false
    ): bool {

        if (!isset($_COOKIE[$name])) {
            return false;
        }

        return setcookie($name, $value, $expires_or_options, $path, $domain, $secure, $httponly);
    }
}
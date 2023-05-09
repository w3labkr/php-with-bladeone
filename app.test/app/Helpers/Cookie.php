<?php

namespace App\Helpers;

class Cookie
{
    public static function set(string $name, string $value = '', array $options = []): bool
    {
        $encrypted_value = encrypt($value);
        $settings = array_merge([
            'expires' => 0,
            'path' => '/',
            'domain' => '',
            'secure' => false,
            'httponly' => false,
            'samesite' => 'None', // None || Lax  || Strict
        ], $options);

        if (is_string($settings['expires'])) {
            $settings['expires'] = strtotime($settings['expires']);
        }

        $_COOKIE[$name] = $encrypted_value;

        return setcookie($name, $encrypted_value, $settings);
    }

    public static function get(string $name): mixed
    {
        if (!isset($_COOKIE[$name])) {
            return null;
        }

        $value = $_COOKIE[$name];
        $decrypted_value = decrypt($value);

        return htmlspecialchars(stripslashes(trim($decrypted_value)));
    }

    public static function has(string $name): bool
    {
        $value = self::get($name);

        return isset($value);
    }

    public static function del(string $name): bool
    {
        if (!isset($_COOKIE[$name])) {
            return false;
        }

        unset($_COOKIE[$name]);

        return setcookie($name, '', ['expires' => 1]);
    }
}

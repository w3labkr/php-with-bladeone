<?php

namespace App\Helpers;

class Cookie
{
    private $defaults = [
        'expires' => 0,
        'path' => '/',
        'domain' => '',
        'secure' => false,
        'httponly' => false,
        'samesite' => null, // "lax", "strict", "none", null
    ];

    public function __construct(string $samesite = '')
    {
        $defaults = $this->defaults;

        if ('Strict' === $samesite) {
            $options = [
                'domain' => $_SERVER['SERVER_NAME'],
                'secure' => true,
                'httponly' => true,
                'samesite' => 'Strict',
            ];
        }

        $this->defaults = array_merge($defaults, $options ?? []);
    }

    public function set(string $name, string $value = '', array $options = []): bool
    {
        $encrypted_value = encrypt($value);
        $settings = array_merge($this->defaults, $options);

        if (is_string($settings['expires'])) {
            $settings['expires'] = strtotime($settings['expires']);
        }

        $_COOKIE[$name] = $encrypted_value;

        return setcookie($name, $encrypted_value, $settings);
    }

    public function get(string $name): mixed
    {
        if (!isset($_COOKIE[$name])) {
            return null;
        }

        $value = $_COOKIE[$name];
        $decrypted_value = decrypt($value);

        return htmlspecialchars(stripslashes(trim($decrypted_value)));
    }

    public function has(string $name): bool
    {
        $value = self::get($name);

        return isset($value);
    }

    public function del(string $name, array $options = []): bool
    {
        if (!isset($_COOKIE[$name])) {
            return false;
        }

        $settings = array_merge($this->defaults, $options);
        $settings['expires'] = 1;

        unset($_COOKIE[$name]);

        return setcookie($name, '', $settings);
    }
}

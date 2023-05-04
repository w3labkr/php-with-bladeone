<?php

namespace App\Helpers;

class Validator
{
    public static function safe(mixed $params): mixed
    {
        return is_array($params) ? self::array($params) : self::mixed($params);
    }

    public static function mixed(mixed $param): mixed
    {
        return htmlspecialchars(stripslashes(trim($param)));
    }

    public static function array(array $params): array
    {
        array_walk_recursive($params, function (&$value) {
            $value = self::mixed($value);
        });

        return $params;
    }
}

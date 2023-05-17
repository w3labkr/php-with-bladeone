<?php

namespace App\Helpers;

class Validator
{
    public static function safety(mixed $params): mixed
    {
        return is_array($params) ? self::array($params) : (is_string($params) ? self::string($params) : $params);
    }

    public static function string(mixed $param): mixed
    {
        return htmlspecialchars(stripslashes(trim($param)));
    }

    public static function array(array $params): array
    {
        array_walk_recursive($params, function (&$value) {
            $value = is_string($value) ? self::string($value) : $value;
        });

        return $params;
    }
}

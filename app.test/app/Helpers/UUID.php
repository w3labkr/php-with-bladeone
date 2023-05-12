<?php

namespace App\Helpers;

class UUID
{
    public static function hex(int $length = 16): string
    {
        return bin2hex(random_bytes($length));
    }

    public static function uuid4(): string
    {
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(self::hex(16), 4));
    }

    public static function bin2uuid4(string $binary): string
    {
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($binary), 4));
    }
}

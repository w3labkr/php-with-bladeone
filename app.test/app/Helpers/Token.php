<?php

namespace App\Helpers;

class Token
{
    public static function generate(int $length = 16): string
    {
        return bin2hex(random_bytes($length));
    }
}

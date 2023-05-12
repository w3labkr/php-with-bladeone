<?php

namespace App\Helpers;

class Blade
{
    public static function csrf_token(string $tokenId = '_token', int $length = 16): void
    {
        $token = generate_token($length);
        session()->set($tokenId, $token);

        echo $token;
    }
}

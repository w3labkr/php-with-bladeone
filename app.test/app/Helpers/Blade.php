<?php

namespace App\Helpers;

class Blade
{
    public static function csrf_token(string $tokenId = '_token'): void
    {
        $token = generate_token();
        session()->set($tokenId, $token);

        echo $token;
    }
}

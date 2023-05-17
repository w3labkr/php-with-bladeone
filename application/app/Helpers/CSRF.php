<?php

namespace App\Helpers;

class CSRF
{
    public static function csrf_token(string $tokenId = '_token', int $length = 16): string
    {
        $token = generate_token($length);
        session()->set($tokenId, $token);

        return $token;
    }

    public static function verify_csrf_token(string $token, string $tokenId = '_token'): bool
    {
        $session_token = session()->get($tokenId);
        $verify = session()->exists($tokenId) && hash_equals($session_token, $token);

        return $verify;
    }
}

<?php

namespace App\Helpers;

class Crypt
{
    public static function encrypt(string $data): string
    {
        $passphrase = hash('sha256', config('app.key'));
        $cipher_algo = config('app.cipher');
        $iv = substr(hash('sha256', config('app.salt')), 0, 16);

        return base64_encode(openssl_encrypt($data, $cipher_algo, $passphrase, 0, $iv));
    }

    public static function decrypt(string $data): string
    {
        $passphrase = hash('sha256', config('app.key'));
        $cipher_algo = config('app.cipher');
        $iv = substr(hash('sha256', config('app.salt')), 0, 16);

        return openssl_decrypt(base64_decode($data), $cipher_algo, $passphrase, 0, $iv);
    }
}

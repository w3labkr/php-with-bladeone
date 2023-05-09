<?php

namespace App\Helpers;

class Encrypter
{
    public static function encrypt(mixed $data): string
    {
        $cipher_algo = config('app.cipher');
        $key = config('app.key');
        $passphrase = hash('sha256', self::getKey($key));
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_algo));
        $encrypted = openssl_encrypt($data, $cipher_algo, $passphrase, 0, $iv);

        return base64_encode($encrypted.'::'.$iv);
    }

    public static function decrypt(string $data): mixed
    {
        $cipher_algo = config('app.cipher');
        $key = config('app.key');
        $passphrase = hash('sha256', self::getKey($key));
        list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);

        return openssl_decrypt($encrypted_data, $cipher_algo, $passphrase, 0, $iv);
    }

    public static function getKey(string $key): string
    {
        if (str_starts_with($key, 'base64:')) {
            return base64_decode(substr($key, 7));
        } elseif (self::isBase64($key)) {
            return base64_decode($key);
        }

        return $key;
    }

    public static function isBase64(string $string): bool
    {
        return base64_encode(base64_decode($string, true)) === $string;
    }
}

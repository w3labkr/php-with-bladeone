<?php

namespace App\Middlewares;

use App\Helpers\Validator;
use App\Interfaces\MiddlewareInterface;

class CSRF implements MiddlewareInterface
{
    public static function auth(string|null $slug = null)
    {
        $array = explode('/', $slug);
        $last_slug = $array[array_key_last($array)];
        $last_page = explode('?', $last_slug)[0];
        $token = Validator::safe($_POST[$last_page]['_token']);

        if (!verify_csrf_token($token)) {
            header('location: /logout');
            exit;
        }
    }
}

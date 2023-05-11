<?php

namespace App\Middlewares;

use App\Interfaces\MiddlewareInterface;

class Welcome implements MiddlewareInterface
{
    public static function auth()
    {
        if (!session()->has('welcomed')) {
            header('location: /logout');
            exit;
        }
    }
}

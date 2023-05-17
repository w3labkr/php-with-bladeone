<?php

namespace App\Middlewares\Auth;

use App\Interfaces\MiddlewareInterface;

class Welcome implements MiddlewareInterface
{
    public static function auth()
    {
        if (session()->noexists('welcomed')) {
            header('location: /logout');
            exit;
        }
    }
}

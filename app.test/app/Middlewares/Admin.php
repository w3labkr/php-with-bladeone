<?php

namespace App\Middlewares;

use App\Interfaces\MiddlewareInterface;

class Admin implements MiddlewareInterface
{
    public static function auth(): void
    {
        if (1 !== session()->get('is_admin')) {
            header('location: /logout');
            exit;
        }
    }
}

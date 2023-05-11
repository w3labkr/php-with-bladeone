<?php

namespace App\Middlewares;

use App\Interfaces\MiddlewareInterface;

class ResetPassword implements MiddlewareInterface
{
    public static function auth()
    {
        if (!session()->has('reset_password_code')) {
            header('location: /logout');
            exit;
        }
    }
}

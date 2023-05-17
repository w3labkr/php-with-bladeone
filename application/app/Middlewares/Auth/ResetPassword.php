<?php

namespace App\Middlewares\Auth;

use App\Interfaces\MiddlewareInterface;

class ResetPassword implements MiddlewareInterface
{
    public static function auth()
    {
        if (session()->noexists('reset_password_token')) {
            header('location: /logout');
            exit;
        }
    }
}

<?php

namespace App\Middlewares;

class Auth
{
    public static function isLogin()
    {
        if (1 !== session()->get('auth.loggedin')) {
            header('location: /login');
            exit;
        }
    }

    public static function isAdmin()
    {
        if (1 !== session()->get('user.is_admin')) {
            header('location: /login');
            exit;
        }
    }

    public static function isWelcome()
    {
        if (0 !== session()->get('user.welcomed')) {
            header('location: /login');
            exit;
        }
    }
}

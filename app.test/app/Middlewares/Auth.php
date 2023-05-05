<?php

namespace App\Middlewares;

class Auth
{
    public static function isLogin($username)
    {
        if (1 !== session()->get('auth.loggedin')) {
            session_destroy();
            header('location: /login');
            exit;
        } elseif (session()->get('user.username') !== $username) {
            session_destroy();
            header('location: /login');
            exit;
        }
    }

    public static function isAdmin()
    {
        if (1 !== session()->get('user.is_admin')) {
            session_destroy();
            header('location: /login');
            exit;
        }
    }

    public static function isWelcome()
    {
        if (0 !== session()->get('user.welcomed')) {
            session_destroy();
            header('location: /login');
            exit;
        }
    }
}

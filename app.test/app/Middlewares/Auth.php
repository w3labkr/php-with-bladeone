<?php

namespace App\Middlewares;

use App\Helpers\Session;

class Auth
{
    public static function isLogin($username)
    {
        if (1 !== Session::get('loggedin')) {
            session_destroy();
            header('location: /login');
            exit;
        } elseif (Session::get('username') !== $username) {
            session_destroy();
            header('location: /login');
            exit;
        }
    }

    public static function isAdmin()
    {
        if (1 !== Session::get('is_admin')) {
            session_destroy();
            header('location: /login');
            exit;
        }
    }

    public static function isWelcome()
    {
        if (0 !== Session::get('welcomed')) {
            session_destroy();
            header('location: /login');
            exit;
        }
    }
}
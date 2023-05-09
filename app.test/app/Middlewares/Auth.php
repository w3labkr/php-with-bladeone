<?php

namespace App\Middlewares;

use App\Helpers\Session;

class Auth
{
    public static function isLogin($username)
    {
        if (1 !== Session::get('loggedin')) {
            header('location: /logout');
            exit;
        } elseif (Session::get('username') !== $username) {
            header('location: /logout');
            exit;
        }
    }

    public static function isAdmin()
    {
        if (1 !== Session::get('is_admin')) {
            header('location: /logout');
            exit;
        }
    }

    public static function isWelcome()
    {
        if (0 !== Session::get('welcomed')) {
            header('location: /logout');
            exit;
        }
    }
}

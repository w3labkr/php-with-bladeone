<?php

namespace App\Middlewares;

class Auth
{
    public function isSignIn()
    {
        if (!isset($_SESSION['user'])) {
            header('location: /sign/signin');
            exit;
        }
    }

    public function isAdmin()
    {
        if (!isset($_SESSION['user']['role']) || 'admin' !== $_SESSION['user']['role']) {
            header('location: /sign/signin');
            exit;
        }
    }

    public function isUser()
    {
        if (!isset($_SESSION['user']['role']) || 'user' !== $_SESSION['user']['role']) {
            header('location: /sign/signin');
            exit;
        }
    }
}

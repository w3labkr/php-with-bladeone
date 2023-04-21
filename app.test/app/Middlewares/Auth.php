<?php

namespace App\Middlewares;

class Auth
{
    public function isSignIn()
    {
        if (!isset($_SESSION['user'])) {
            header('location: /sign/signin');
            exit();
        }
    }

    public function isAdmin()
    {
        if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin') {
            header('location: /sign/signin');
            exit();
        }
    }

    public function isUser()
    {
        if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'user') {
            header('location: /sign/signin');
            exit();
        }
    }
}

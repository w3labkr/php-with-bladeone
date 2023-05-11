<?php

namespace App\Middlewares;

class Users
{
    public static function auth($username): void
    {
        if (cookie()->has('uuid') && cookie()->has('remember_token')) {
            self::setUser();
        } elseif (1 !== session()->get('loggedin')) {
            header('location: /logout');
            exit;
        } elseif (session()->get('username') !== $username) {
            header('location: /logout');
            exit;
        }
    }

    public static function setUser(): array|bool
    {
        $uuid = cookie()->get('uuid');
        $remember_token = cookie()->get('remember_token');
        $user = (new \App\Models\Users())->findUserByUUID($uuid);

        if ($user && hash_equals($remember_token, $user['remember_token'])) {
            session()->set('loggedin', 1);
            session()->set('userid', $user['id']);
            session()->set('username', $user['username']);
            session()->set('is_admin', $user['is_admin']);

            return $user;
        }

        return false;
    }
}

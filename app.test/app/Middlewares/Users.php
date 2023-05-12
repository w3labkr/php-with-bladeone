<?php

namespace App\Middlewares;

use App\Interfaces\MiddlewareInterface;

class Users implements MiddlewareInterface
{
    public static function auth(string|null $username = null)
    {
        if (cookie()->has('uuid') && cookie()->has('refresh_token')) {
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
        $refresh_token = cookie()->get('refresh_token');
        $user = (new \App\Models\Users())->findUserByUUID($uuid);

        if ($user && hash_equals($refresh_token, $user['refresh_token'])) {
            session()->set('loggedin', 1);
            session()->set('userid', $user['id']);
            session()->set('username', $user['username']);
            session()->set('is_admin', $user['is_admin']);

            return $user;
        }

        return false;
    }
}

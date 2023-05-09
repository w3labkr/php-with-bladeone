<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Helpers\Cookie;
use App\Helpers\Session;
use App\Helpers\Validator;
use App\Interfaces\ControllerInterface;
use App\Models\Users;

class Login extends Controller implements ControllerInterface
{
    public function get()
    {
        if (1 === Session::get('loggedin')) {
            $username = Session::get('username');
            header("Location: /users/{$username}");
            exit;
        }

        if (Cookie::has('username') && Cookie::has('remember_token')) {
            $username = Cookie::get('username');
            $remember_token = Cookie::get('remember_token');
            $user = (new Users())->findUserByUsername($username);

            if (hash_equals($remember_token, $user['remember_token'])) {
                Session::set('loggedin', 1);
                Session::set('userid', $user['id']);
                Session::set('username', $user['username']);
                Session::set('is_admin', $user['is_admin']);

                header("Location: /users/{$user['username']}");
                exit;
            }
        }

        echo $this->view('pages.auth.login');
    }

    public function post()
    {
        $data = $this->data;

        $newer = Validator::safe($_POST['user']);
        $older = $user = (new Users())->findUserByUsername($newer['username']);

        if ($user && password_verify($newer['password'], $older['password'])) {
            Session::set('loggedin', 1);
            Session::set('userid', $user['id']);
            Session::set('username', $user['username']);
            Session::set('is_admin', $user['is_admin']);

            if (isset($newer['remember_me']) && 'on' === $newer['remember_me']) {
                $options = [
                    'expires' => '+30 days',
                    'path' => '/',
                    'domain' => $_SERVER['SERVER_NAME'],
                    'secure' => true,
                    'httponly' => true,
                    'samesite' => 'Strict',
                ];
                Cookie::set('username', $user['username'], $options);
                Cookie::set('remember_token', $user['username'], $options);
            } else {
                Cookie::del('username');
                Cookie::del('remember_token');
            }

            header("Location: /users/{$user['username']}");
            exit;
        }

        $data['status'] = 'fail';
        $data['errors'][] = ['message' => 'The username or password is incorrect.'];

        echo $this->view('pages.auth.login', compact('data'));
    }

    public function patch()
    {
    }

    public function put()
    {
    }

    public function delete()
    {
    }

    public function options()
    {
    }
}

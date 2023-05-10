<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Helpers\Validator;
use App\Interfaces\ControllerInterface;
use App\Middlewares\Auth;
use App\Models\Users;

class Login extends Controller implements ControllerInterface
{
    public function get()
    {
        if (cookie()->has('uuid') && cookie()->has('remember_token')) {
            $user = Auth::setUser();
            if ($user) {
                header("Location: /users/{$user['username']}");
                exit;
            }
        } elseif (1 === session()->get('loggedin')) {
            $username = session()->get('username');
            header("Location: /users/{$username}");
            exit;
        }

        echo $this->view('pages.auth.login');
    }

    public function post()
    {
        $data = $this->data;

        $newer = Validator::safe($_POST['user']);
        $older = $user = (new Users())->findUserByUsername($newer['username']);

        if ($user && password_verify($newer['password'], $older['password'])) {
            session()->set('loggedin', 1);
            session()->set('userid', $user['id']);
            session()->set('username', $user['username']);
            session()->set('is_admin', $user['is_admin']);

            if (isset($newer['remember_me']) && 'on' === $newer['remember_me']) {
                $options = [
                    'expires' => '+30 days',
                ];
                cookie('Strict')->set('uuid', bin2uuid4($user['uuid']), $options);
                cookie('Strict')->set('remember_token', $user['remember_token'], $options);
            } else {
                cookie('Strict')->del('uuid');
                cookie('Strict')->del('remember_token');
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

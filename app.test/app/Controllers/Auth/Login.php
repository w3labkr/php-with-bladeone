<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Helpers\Validator;
use App\Interfaces\ControllerInterface;
use App\Models\Users;

class Login extends Controller implements ControllerInterface
{
    public function get()
    {
        if (cookie()->has('uuid') && cookie()->has('refresh_token')) {
            $user = \App\Middlewares\Users::setUser();
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
        $post = Validator::safe($_POST['user']);

        $users = new Users();
        $user = $users->findUserByUsername($post['username']);

        if (!hash_equals(session()->get('_token'), $post['_token'])) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Invalid Token.'];
        } elseif (!$user) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Username or password is incorrect.'];
        } elseif (!password_verify($post['password'], $user['password'])) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Username or password is incorrect.'];
        } else {
            session()->set('loggedin', 1);
            session()->set('userid', $user['id']);
            session()->set('username', $user['username']);
            session()->set('is_admin', $user['is_admin']);

            if (isset($post['remember_me']) && 'on' === $post['remember_me']) {
                $options = [
                    'expires' => '+30 days',
                ];
                cookie('Strict')->set('uuid', bin2uuid4($user['uuid']), $options);
                cookie('Strict')->set('refresh_token', $user['refresh_token'], $options);
            } else {
                cookie('Strict')->del('uuid');
                cookie('Strict')->del('refresh_token');
            }

            $users->updateLastLoginAtById(date('Y-m-d H:i:s'), $user['id']);

            header("Location: /users/{$user['username']}");
            exit;
        }

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

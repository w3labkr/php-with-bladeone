<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Interfaces\ControllerInterface;
use App\Models\Users;

class Login extends Controller implements ControllerInterface
{
    public function get()
    {
        $csrf_token = csrf_token();

        if (cookie()->exists('uuid') && cookie()->exists('refresh_token')) {
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

        echo $this->view('pages.auth.login', compact('csrf_token'));
    }

    public function post()
    {
        $csrf_token = csrf_token();

        $data = $this->data;
        $post = safety($_POST['login']);

        $users = new Users();
        $user = $users->findUserByUsername($post['username']);

        if (!$user) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Username or password is incorrect.'];
        } elseif ($user['deleted_at']) {
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

        echo $this->view('pages.auth.login', compact('csrf_token', 'data'));
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

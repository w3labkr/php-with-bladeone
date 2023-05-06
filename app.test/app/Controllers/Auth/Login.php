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
        if (1 === session()->get('auth.loggedin')) {
            $username = session()->get('user.username');
            header("Location: /users/{$username}");
            exit;
        }

        echo $this->view('pages.auth.login');
    }

    public function post()
    {
        $data = $this->data;

        $users = new Users();
        $newer = Validator::safe($_POST['user']);
        $older = $user = $users->findUserByUsername($newer['username']);

        if ($user && password_verify($newer['password'], $older['password'])) {
            if ($user['deleted_at']) {
                // $data['status'] = 'fail';
                // $data['errors'][] = ['message' => 'User account has been deleted.'];
            } else {
                $_SESSION['auth']['loggedin'] = 1;
                $_SESSION['user']['id'] = $user['id'];
                $_SESSION['user']['username'] = $user['username'];
                $_SESSION['user']['is_admin'] = $user['is_admin'];

                header("Location: /users/{$user['username']}");
                exit;
            }
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

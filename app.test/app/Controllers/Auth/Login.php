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
        echo $this->view('pages.auth.login');
    }

    public function post()
    {
        $params = Validator::safe($_POST['user']);

        $username = $params['username'];
        $password = $params['password'];

        $user = (new Users())->findUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['auth']['loggedin'] = 1;
            $_SESSION['user']['id'] = $user['id'];
            $_SESSION['user']['uuid'] = bin2hex($user['uuid']);
            $_SESSION['user']['is_admin'] = $user['is_admin'];

            header("Location: /users/{$_SESSION['user']['uuid']}/profile");
            exit;
        }

        $errors[] = 'The username or password is incorrect.';

        echo $this->view('pages.auth.login', compact('errors'));
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

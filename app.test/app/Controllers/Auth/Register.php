<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Helpers\Validator;
use App\Interfaces\ControllerInterface;
use App\Models\Users;
use Database\Factories\UserFactory;

class Register extends Controller implements ControllerInterface
{
    public function get()
    {
        echo $this->view('pages.auth.register');
    }

    public function post()
    {
        $users = new Users();
        $params = Validator::safe($_POST['user']);

        $username = $params['username'];
        $email = $params['email'];
        $password = password_hash($params['password'], PASSWORD_DEFAULT);

        $errors = [];

        if ($users->findUserByUsername($username)) {
            $errors[] = 'Username already exists.';
        }

        if ($users->findUserByEmail($email)) {
            $errors[] = 'Email already exists.';
        }

        if (empty($errors)) {
            $factory = new UserFactory();
            $users->addUser(array_merge($factory->definition(), $factory->unverified(), compact('username', 'email', 'password')));
            $user = $users->findUserByUsername($username);

            session_regenerate_id();

            $_SESSION['user']['id'] = $user['id'];
            $_SESSION['user']['welcomed'] = $user['welcomed'];

            header('Location: /welcome');
            exit;
        }

        echo $this->view('pages.auth.register', compact('errors'));
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

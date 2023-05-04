<?php

namespace App\Controllers\Users;

use App\Controllers\Controller;
use App\Helpers\Validator;
use App\Interfaces\ControllerInterface;
use App\Models\Users;

class Profile extends Controller implements ControllerInterface
{
    public function get()
    {
        $id = $_SESSION['user']['id'];
        $user = (new Users())->findUserById($id);

        echo $this->view('pages.users.profile', compact('user'));
    }

    public function post()
    {
        $params = Validator::safe($_POST['user']);
        $email = $params['email'];
        $password = password_hash($params['password'], PASSWORD_DEFAULT);

        $users = new Users();
        $id = $_SESSION['user']['id'];

        $errors = [];

        if ($users->findUserByEmail($email)) {
            $errors[] = 'Email already exists.';
        } else {
            $users->updateEmailById($email, $id);
        }

        if (!empty($password)) {
            $users->updatePasswordById($password, $id);
        }

        $user = $users->findUserById($id);

        echo $this->view('pages.users.profile', compact('user', 'errors'));
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

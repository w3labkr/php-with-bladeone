<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Helpers\Session;
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
        $data = $this->data;

        $users = new Users();
        $newer = Validator::safe($_POST['user']);

        if ($newer['password'] !== $newer['confirm_password']) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Passwords do not match.'];
        } elseif ($users->findUserByUsername($newer['username'])) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Username already exists.'];
        } elseif ($users->findUserByEmail($newer['email'])) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Email already exists.'];
        } else {
            $factory = new UserFactory();
            $params = array_merge($factory->definition(), $factory->unverified(), $newer);

            unset($params['confirm_password']);

            $users->addUser($params);
            $user = $users->findUserByUsername($newer['username']);

            session_regenerate_id();

            Session::set('userid', $user['id']);
            Session::set('welcomed', $user['welcomed']);

            header('Location: /welcome');
            exit;
        }

        echo $this->view('pages.auth.register', compact('data'));
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

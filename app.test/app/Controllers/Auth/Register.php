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
        $data = $this->data;
        $post = Validator::safe($_POST['user']);

        $users = new Users();

        if (!hash_equals(session()->get('_token'), $post['_token'])) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Invalid Token.'];
        } elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Invalid Email Address.'];
        } elseif ($post['password'] !== $post['confirm_password']) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Passwords do not match.'];
        } elseif ($users->findUserByUsername($post['username'])) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Username already exists.'];
        } elseif ($users->findUserByEmail($post['email'])) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Email already exists.'];
        } else {
            $factory = new UserFactory();
            $params = array_merge($factory->definition(), $factory->unverified(), $post);

            $params['nickname'] = $params['username'];
            unset($params['confirm_password']);

            $users->addUser($params);
            $user = $users->findUserByUsername($post['username']);

            session_regenerate_id();

            session()->set('userid', $user['id']);
            session()->set('welcomed', $user['welcomed']);

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

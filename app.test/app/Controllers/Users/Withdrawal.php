<?php

namespace App\Controllers\Users;

use App\Controllers\Controller;
use App\Helpers\Validator;
use App\Interfaces\ControllerInterface;
use App\Models\Users;

class Withdrawal extends Controller implements ControllerInterface
{
    public function get()
    {
    }

    public function post()
    {
        $csrf_token = csrf_token();

        $data['withdrawal'] = $this->data;
        $post = Validator::safe($_POST['withdrawal']);

        $users = new Users();
        $userid = session()->get('userid');
        $user = $users->findUserById($userid);

        if ($post['username'] !== $user['username']) {
            $data['withdrawal']['status'] = 'fail';
            $data['withdrawal']['errors'][] = ['message' => 'Username does not match.'];
        } elseif ('delete my account' !== $post['verify']) {
            $data['withdrawal']['status'] = 'fail';
            $data['withdrawal']['errors'][] = ['message' => 'Verify not match.'];
        } elseif (!password_verify($post['password'], $user['password'])) {
            $data['withdrawal']['status'] = 'fail';
            $data['withdrawal']['errors'][] = ['message' => 'Password do not match.'];
        } else {
            $users->deleteUserById($userid);

            header('Location: /farewell');
            exit;
        }

        echo $this->view('pages.users.account', compact('user', 'csrf_token', 'data'));
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

<?php

namespace App\Controllers\Users;

use App\Controllers\Controller;
use App\Helpers\Validator;
use App\Interfaces\ControllerInterface;
use App\Models\Users;

class Account extends Controller implements ControllerInterface
{
    public function get()
    {
        $csrf_token = csrf_token();

        $userid = session()->get('userid');
        $user = (new Users())->findUserById($userid);

        echo $this->view('pages.users.account', compact('user', 'csrf_token'));
    }

    public function post()
    {
        $csrf_token = csrf_token();

        $data['account'] = $this->data;
        $post = Validator::safe($_POST['account']);

        $users = new Users();
        $userid = session()->get('userid');
        $user = $users->findUserById($userid);

        if ($users->findUserByUsername($post['username'])) {
            $data['account']['status'] = 'fail';
            $data['account']['errors'][] = ['message' => 'Username already exists.'];
        } else {
            $users->updateUsernameById($post['username'], $userid);

            $data['account']['status'] = 'success';
            $data['account']['message'] = 'Your username has been successfully changed.';

            header('Location: /logout');
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

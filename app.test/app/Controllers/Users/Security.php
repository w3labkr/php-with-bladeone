<?php

namespace App\Controllers\Users;

use App\Controllers\Controller;
use App\Helpers\Validator;
use App\Interfaces\ControllerInterface;
use App\Models\Users;

class Security extends Controller implements ControllerInterface
{
    public function get()
    {
        $csrf_token = csrf_token();

        $userid = session()->get('userid');
        $user = (new Users())->findUserById($userid);

        echo $this->view('pages.users.security', compact('user', 'csrf_token'));
    }

    public function post()
    {
        $csrf_token = csrf_token();

        $data = $this->data;
        $post = Validator::safe($_POST['security']);

        $users = new Users();
        $userid = session()->get('userid');
        $user = $users->findUserById($userid);

        if (!password_verify($post['password'], $user['password'])) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Old password do not match.'];
        } elseif (password_verify($post['new_password'], $user['password'])) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'It cannot be changed with the same password.'];
        } elseif ($post['new_password'] !== $post['confirm_new_password']) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'New password does not match.'];
        } else {
            $users->updatePasswordById($post['new_password'], $userid);
            $data['status'] = 'success';
            $data['message'] = 'Your password has been successfully changed.';
        }

        echo $this->view('pages.users.security', compact('user', 'data', 'csrf_token'));
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

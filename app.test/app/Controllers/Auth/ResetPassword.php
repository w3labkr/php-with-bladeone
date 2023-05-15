<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Helpers\Validator;
use App\Interfaces\ControllerInterface;
use App\Models\Users;

class ResetPassword extends Controller implements ControllerInterface
{
    public function get()
    {
        $csrf_token = csrf_token();
        $user = [];

        list($localPart, $domain) = explode('@', session()->get('email'));
        $localPart = substr_replace_offset($localPart, '*', 2);

        list($name, $tld) = explode('.', $domain);
        $name = substr_replace_offset($name, '*', 2);
        $user['email'] = $localPart.'@'.$name.'.'.$tld;

        echo $this->view('pages.auth.reset-password', compact('user', 'csrf_token'));
    }

    public function post()
    {
        $csrf_token = csrf_token();

        $data = $this->data;
        $post = Validator::safe($_POST['reset-password']);

        $users = new Users();
        $userid = session()->get('userid');
        $user = $users->findUserById($userid);

        if (!$user) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'The username is incorrect.'];
        } elseif (!hash_equals(session()->get('reset_password_token'), $post['reset_password_token'])) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Code does not match.'];
        } elseif ($post['new_password'] !== $post['confirm_new_password']) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'New password does not match.'];
        } else {
            $users->updatePasswordById($post['new_password'], $userid);

            $data['status'] = 'success';
            $data['message'] = 'Your password has been successfully changed.';

            session()->destroy();
        }

        echo $this->view('pages.auth.reset-password', compact('csrf_token', 'data'));
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

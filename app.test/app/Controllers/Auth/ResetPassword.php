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
        session()->set('email', 'abc.asd@example.com');

        $user = [];

        list($localPart, $domain) = explode('@', session()->get('email'));
        $localPart = substr_replace_offset($localPart, '*', 2);

        list($name, $tld) = explode('.', $domain);
        $name = substr_replace_offset($name, '*', 2);
        $user['email'] = $localPart.'@'.$name.'.'.$tld;

        echo $this->view('pages.auth.reset-password', compact('user'));
    }

    public function post()
    {
        $data = $this->data;
        $post = Validator::safe($_POST['user']);

        $users = new Users();
        $userid = session()->get('userid');
        $user = $users->findUserById($userid);

        if ($user) {
            if (!hash_equals(session()->get('reset_password_code'), $post['reset_password_code'])) {
                $data['status'] = 'fail';
                $data['errors'][] = ['message' => 'Code does not match.'];
            } elseif ($post['new_password'] !== $post['confirm_new_password']) {
                $data['status'] = 'fail';
                $data['errors'][] = ['message' => 'New password does not match.'];
            } else {
                $users->updatePasswordById($post['new_password'], $userid);

                $data['status'] = 'success';
                $data['message'] = 'Your password has been successfully changed.';

                session_destroy();
            }
        } else {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'The username is incorrect.'];
        }

        echo $this->view('pages.auth.reset-password', compact('data'));
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

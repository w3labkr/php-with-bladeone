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
        $userid = session()->get('userid');
        $user = (new Users())->findUserById($userid);

        echo $this->view('pages.users.profile', compact('user'));
    }

    public function post()
    {
        $data = $this->data;
        $post = Validator::safe($_POST['user']);

        $users = new Users();
        $userid = session()->get('userid');
        $user = $users->findUserById($userid);

        if ($user['nickname'] === $post['nickname']) {
            // ...
        } else {
            $users->updateNicknameById($post['nickname'], $userid);
            $data['status'] = 'success';
            $data['message'] = 'Your profile has been successfully changed.';
        }

        if ($user['email'] === $post['email']) {
            // ...
        } elseif ($users->findUserByEmail($post['email'])) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Email already exists.'];
        } else {
            $users->updateEmailById($post['email'], $userid);
            $data['status'] = 'success';
            $data['message'] = 'Your profile has been successfully changed.';
        }

        $user = $users->findUserById($userid);

        echo $this->view('pages.users.profile', compact('user', 'data'));
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

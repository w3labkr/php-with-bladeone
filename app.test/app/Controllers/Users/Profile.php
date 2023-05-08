<?php

namespace App\Controllers\Users;

use App\Controllers\Controller;
use App\Helpers\Validator;
use App\Interfaces\ControllerInterface;
use App\Models\Users;
use App\Helpers\Session;

class Profile extends Controller implements ControllerInterface
{
    public function get()
    {
        $id = Session::get('userid');
        $user = (new Users())->findUserById($id);

        echo $this->view('pages.users.profile', compact('user'));
    }

    public function post()
    {
        $id = Session::get('userid');
        $data = $this->data;

        $users = new Users();
        $older = $users->findUserById($id);
        $newer = Validator::safe($_POST['user']);

        if ($older['nickname'] === $newer['nickname']) {
            // ...
        } else {
            $users->updateNicknameById($newer['nickname'], $id);
            $data['status'] = 'success';
            $data['message'] = 'Your profile has been successfully changed.';
        }

        if ($older['email'] === $newer['email']) {
            // ...
        } elseif ($users->findUserByEmail($newer['email'])) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Email already exists.'];
        } else {
            $users->updateEmailById($newer['email'], $id);
            $data['status'] = 'success';
            $data['message'] = 'Your profile has been successfully changed.';
        }

        $user = $users->findUserById($id);

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
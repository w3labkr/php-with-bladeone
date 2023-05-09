<?php

namespace App\Controllers\Users;

use App\Controllers\Controller;
use App\Helpers\Session;
use App\Helpers\Validator;
use App\Interfaces\ControllerInterface;
use App\Models\Users;

class Security extends Controller implements ControllerInterface
{
    public function get()
    {
        $id = Session::get('userid');
        $user = (new Users())->findUserById($id);

        // $users = new Users();
        // $users->updatePasswordById('1', $id);

        echo $this->view('pages.users.security', compact('user'));
    }

    public function post()
    {
        $id = Session::get('userid');
        $data = $this->data;

        $users = new Users();
        $older = $user = $users->findUserById($id);
        $newer = Validator::safe($_POST['user']);

        if (!password_verify($newer['password'], $older['password'])) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Old password do not match.'];
        } elseif (password_verify($newer['new_password'], $older['password'])) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'It cannot be changed with the same password.'];
        } elseif ($newer['new_password'] !== $newer['confirm_new_password']) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'New password does not match.'];
        } else {
            $users->updatePasswordById($newer['new_password'], $id);
            $data['message'] = 'Your password has been successfully changed.';
        }

        echo $this->view('pages.users.security', compact('user', 'data'));
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

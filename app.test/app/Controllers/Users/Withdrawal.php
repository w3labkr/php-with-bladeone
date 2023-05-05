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
        $id = session()->get('user.id');
        $data2 = $this->data;

        $users = new Users();
        $older = $user = $users->findUserById($id);
        $newer = Validator::safe($_POST['user']);

        if ($newer['username'] !== $older['username']) {
            $data2['status'] = 'fail';
            $data2['errors'][] = ['message' => 'Username does not match.'];
        } elseif ('delete my account' !== $newer['verify']) {
            $data2['status'] = 'fail';
            $data2['errors'][] = ['message' => 'Verify not match.'];
        } elseif (!password_verify($newer['password'], $older['password'])) {
            $data2['status'] = 'fail';
            $data2['errors'][] = ['message' => 'Password do not match.'];
        } else {
            $users->deleteUserById($id);

            header('Location: /farewell');
            exit;
        }

        echo $this->view('pages.users.account', compact('user', 'data2'));
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

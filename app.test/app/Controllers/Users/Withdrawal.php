<?php

namespace App\Controllers\Users;

use App\Controllers\Controller;
use App\Helpers\Session;
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
        $id = Session::get('userid');
        $data['withdrawal'] = $this->data;

        $users = new Users();
        $older = $user = $users->findUserById($id);
        $newer = Validator::safe($_POST['user']);

        if ($newer['username'] !== $older['username']) {
            $data['withdrawal']['status'] = 'fail';
            $data['withdrawal']['errors'][] = ['message' => 'Username does not match.'];
        } elseif ('delete my account' !== $newer['verify']) {
            $data['withdrawal']['status'] = 'fail';
            $data['withdrawal']['errors'][] = ['message' => 'Verify not match.'];
        } elseif (!password_verify($newer['password'], $older['password'])) {
            $data['withdrawal']['status'] = 'fail';
            $data['withdrawal']['errors'][] = ['message' => 'Password do not match.'];
        } else {
            $users->deleteUserById($id);

            header('Location: /farewell');
            exit;
        }

        echo $this->view('pages.users.account', compact('user', 'data'));
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

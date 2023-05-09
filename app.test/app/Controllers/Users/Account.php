<?php

namespace App\Controllers\Users;

use App\Controllers\Controller;
use App\Helpers\Session;
use App\Helpers\Validator;
use App\Interfaces\ControllerInterface;
use App\Models\Users;

class Account extends Controller implements ControllerInterface
{
    public function get()
    {
        $id = Session::get('userid');
        $user = (new Users())->findUserById($id);

        echo $this->view('pages.users.account', compact('user'));
    }

    public function post()
    {
        $id = Session::get('userid');
        $data['account'] = $this->data;

        $users = new Users();
        $older = $user = $users->findUserById($id);
        $newer = Validator::safe($_POST['user']);

        if ($users->findUserByUsername($newer['username'])) {
            $data['account']['status'] = 'fail';
            $data['account']['errors'][] = ['message' => 'Username already exists.'];
        } else {
            $users->updateUsernameById($newer['username'], $id);
            $user = $users->findUserById($id);

            $data['account']['status'] = 'success';
            $data['account']['message'] = 'Your username has been successfully changed.';

            header('Location: /logout');
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

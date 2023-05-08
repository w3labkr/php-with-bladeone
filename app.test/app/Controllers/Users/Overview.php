<?php

namespace App\Controllers\Users;

use App\Controllers\Controller;
use App\Interfaces\ControllerInterface;
use App\Models\Users;
use App\Helpers\Session;

class Overview extends Controller implements ControllerInterface
{
    public function get()
    {
        $id = Session::get('userid');
        $user = (new Users())->findUserById($id);

        echo $this->view('pages.users.overview', compact('user'));
    }

    public function post()
    {
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
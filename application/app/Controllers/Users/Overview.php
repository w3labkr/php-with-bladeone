<?php

namespace App\Controllers\Users;

use App\Controllers\Controller;
use App\Interfaces\ControllerInterface;
use App\Models\Users;

class Overview extends Controller implements ControllerInterface
{
    public function get()
    {
        $userid = session()->get('userid');
        $user = (new Users())->findUserById($userid);

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

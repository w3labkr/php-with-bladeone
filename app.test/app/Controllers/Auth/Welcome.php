<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Interfaces\ControllerInterface;
use App\Models\Users;

class Welcome extends Controller implements ControllerInterface
{
    public function get()
    {
        $id = session()->get('userid');
        (new Users())->updateWelcomedById(1, $id);

        session_destroy();

        echo $this->view('pages.auth.welcome');
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

<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Interfaces\ControllerInterface;

class ResetPassword extends Controller implements ControllerInterface
{
    public function get()
    {
        echo $this->view('pages.auth.reset-password');
    }

    public function post()
    {
        header('location: /login');
        exit;
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

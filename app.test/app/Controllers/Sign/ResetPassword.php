<?php

namespace App\Controllers\Sign;

use App\Controllers\Controller;
use App\Interfaces\Controller as ControllerInterface;

class ResetPassword extends Controller implements ControllerInterface
{
    public function get()
    {
        echo $this->view('pages.sign.reset-password');
    }

    public function post()
    {
        header('location: /sign/signin');
        exit;
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

    public function patch()
    {
    }
}

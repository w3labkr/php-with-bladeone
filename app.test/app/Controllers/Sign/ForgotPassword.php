<?php

namespace App\Controllers\Sign;

use App\Controllers\Controller;
use App\Interfaces\Controller as ControllerInterface;

class ForgotPassword extends Controller implements ControllerInterface
{
    public function get()
    {
        echo $this->view('pages.sign.forgot-password');
    }

    public function post()
    {
        header('location: /sign/reset-password');
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

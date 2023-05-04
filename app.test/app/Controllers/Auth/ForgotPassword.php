<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Interfaces\ControllerInterface;

class ForgotPassword extends Controller implements ControllerInterface
{
    public function get()
    {
        echo $this->view('pages.auth.forgot-password');
    }

    public function post()
    {
        header('location: /reset-password');
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

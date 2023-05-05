<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Interfaces\ControllerInterface;

class ForgotUsername extends Controller implements ControllerInterface
{
    public function get()
    {
        echo $this->view('pages.auth.forgot-username');
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

<?php

namespace App\Controllers\Sign;

use App\Controllers\Controller;
use App\Interfaces\Controller as ControllerInterface;

class Signup extends Controller implements ControllerInterface
{
    public function get()
    {
        echo $this->view('pages.sign.signup');
    }

    public function post()
    {
        echo $this->view('pages.sign.signup');
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

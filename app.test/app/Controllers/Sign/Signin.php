<?php

namespace App\Controllers\Sign;

use App\Controllers\Controller;
use App\Interfaces\Controller as ControllerInterface;

class Signin extends Controller implements ControllerInterface
{
    public function get()
    {
        // $data = User::getUser($_POST);
        // echo $this->view("pages.sign.signin", $data);
        echo $this->view('pages.sign.signin');
    }

    public function post()
    {
        echo $this->view('pages.sign.signin');
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

<?php

namespace App\Controllers\Sign;

use App\Controllers\Controller;
use App\Interfaces\Controller as ControllerInterface;

class Welcome extends Controller implements ControllerInterface
{
    public function get()
    {
        echo $this->view('pages.sign.welcome');
    }

    public function post()
    {
        echo $this->view('pages.sign.welcome');
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

<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Interfaces\ControllerInterface;

class Farewell extends Controller implements ControllerInterface
{
    public function get()
    {
        echo $this->view('pages.auth.farewell');
    }

    public function post()
    {
        echo $this->view('pages.auth.farewell');
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

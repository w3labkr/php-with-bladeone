<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Interfaces\ControllerInterface;

class Farewell extends Controller implements ControllerInterface
{
    public function get()
    {
        session()->destroy();

        echo $this->view('pages.auth.farewell');
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

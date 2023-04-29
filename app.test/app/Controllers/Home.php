<?php

namespace App\Controllers;

use App\Interfaces\Controller as ControllerInterface;

class Home extends Controller implements ControllerInterface
{
    public function get()
    {
        echo $this->view('pages.home');
    }

    public function post()
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

    public function patch()
    {
    }
}

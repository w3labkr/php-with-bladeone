<?php

namespace App\Controllers;

use App\Interfaces\ControllerInterface;

class Index extends Controller implements ControllerInterface
{
    public function get()
    {
        echo $this->view('pages.index');
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

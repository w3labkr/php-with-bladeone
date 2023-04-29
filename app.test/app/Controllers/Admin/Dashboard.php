<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Interfaces\Controller as ControllerInterface;

class Dashboard extends Controller implements ControllerInterface
{
    public function get()
    {
        echo $this->view('pages.admin.dashboard');
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

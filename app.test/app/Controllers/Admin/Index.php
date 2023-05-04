<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Interfaces\ControllerInterface;

class Index extends Controller implements ControllerInterface
{
    public function get()
    {
        header('location: /admin/dashboard');
        exit;
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

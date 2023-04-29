<?php

namespace App\Controllers\Sign;

use App\Controllers\Controller;
use App\Interfaces\Controller as ControllerInterface;

class Index extends Controller implements ControllerInterface
{
    public function get()
    {
        header('location: /sign/signin');
        exit;
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

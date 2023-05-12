<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Interfaces\ControllerInterface;

class Logout extends Controller implements ControllerInterface
{
    public function get()
    {
        session()->destroy();

        cookie('Strict')->del('uuid');
        cookie('Strict')->del('remember_token');

        header('location: /');
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

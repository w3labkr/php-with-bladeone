<?php

namespace App\Controllers\Sign;

use App\Controllers\Controller;
use App\Interfaces\Controller as ControllerInterface;

class Signout extends Controller implements ControllerInterface
{
    public function get()
    {
        echo $this->view('pages.sign.signout');
    }

    public function post()
    {
        // to expire the session
        // setcookie(session_name(), session_id(), 1);
        // $_SESSION = [];

        // header('location: /sign/signin');
        // exit;
        echo $this->view('pages.sign.signout');
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

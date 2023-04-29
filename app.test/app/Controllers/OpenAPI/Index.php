<?php

namespace App\Controllers\OpenAPI;

use App\Controllers\Controller;
use App\Interfaces\Controller as ControllerInterface;

class Index extends Controller implements ControllerInterface
{
    public function get()
    {
        header('location: /openapi/v1');
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

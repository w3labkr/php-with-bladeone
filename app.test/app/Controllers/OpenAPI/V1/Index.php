<?php

namespace App\Controllers\OpenAPI\V1;

use App\Controllers\Controller;
use App\Interfaces\Controller as ControllerInterface;

class Index extends Controller implements ControllerInterface
{
    public function get()
    {
        echo $this->view('pages.openapi.v1.index', [
            'state' => 'success',
            'message' => 'message',
            'data' => [],
        ]);
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

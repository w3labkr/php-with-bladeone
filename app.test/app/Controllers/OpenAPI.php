<?php

namespace App\Controllers;

class OpenAPI
{
    public function index()
    {
        header('location: /openapi/v1');
        exit();
    }

    public function v1()
    {
        echo 'OpenAPI v1';
    }
}

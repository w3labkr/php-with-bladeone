<?php

namespace App\Controllers;

class Api
{
    public function index()
    {
        header('location: /api/v1');
        exit();
    }

    public function v1()
    {
        echo 'API v1';
    }
}

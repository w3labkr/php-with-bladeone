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
        $model = new \App\Models\OpenAPI();
        $data = $model->getDatabases();

        echo view("openapi.v1.index", $data);
    }
}

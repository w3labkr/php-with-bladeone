<?php

namespace App\Controllers;

class Admin
{
    public function index()
    {
        header('location: /admin');
        exit();
    }

    public function v1()
    {
        echo view("admin.index", array("variable1" => "value1"));
    }
}

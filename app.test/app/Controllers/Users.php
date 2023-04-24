<?php

namespace App\Controllers;

class Users
{
    public function index()
    {
        header('location: /users');
        exit();
    }

    public function v1()
    {
        echo view("users.index", array("variable1" => "value1"));
    }
}

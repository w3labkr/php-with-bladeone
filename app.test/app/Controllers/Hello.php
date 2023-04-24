<?php

namespace App\Controllers;

class Hello
{
    public function index()
    {
        echo view("hello", array("variable1" => "value1"));
    }
}

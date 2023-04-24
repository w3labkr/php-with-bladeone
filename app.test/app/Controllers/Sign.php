<?php

namespace App\Controllers;

class Sign
{
    public function index()
    {
        header('location: /sign/signin');
        exit();
    }

    public function signin()
    {
        echo view("sign.signin", array("variable1" => "value1"));
    }

    public function signout()
    {
        echo view("sign.signout", array("variable1" => "value1"));
    }

    public function signup()
    {
        echo view("sign.signup", array("variable1" => "value1"));
    }

    public function welcome()
    {
        echo view("sign.welcome", array("variable1" => "value1"));
    }

    public function farewell()
    {
        echo view("sign.farewell", array("variable1" => "value1"));
    }
}

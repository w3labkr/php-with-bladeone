<?php

namespace App\Controllers;

use App\Models\User;

class Sign
{
    public function index()
    {
        header('location: /sign/signin');
        exit;
    }

    public function signin()
    {
        echo view('pages.sign.signin');
    }

    public function postSignin()
    {
        // $data = User::getUser($_POST);

        // echo view("pages.sign.signin", $data);
        echo view('pages.sign.signin');
    }

    public function signout()
    {
        // to expire the session
        setcookie(session_name(), session_id(), 1);
        $_SESSION = [];

        header('location: /sign/signin');
        exit;
    }

    public function signup()
    {
        echo view('pages.sign.signup');
    }

    public function postSignup()
    {
        // $data = User::getUser();

        // echo view("pages.sign.signin", $data);
        echo view('pages.sign.signin');
    }

    public function welcome()
    {
        echo view('pages.sign.welcome');
    }

    public function farewell()
    {
        echo view('pages.sign.farewell');
    }
}

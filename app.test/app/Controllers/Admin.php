<?php

namespace App\Controllers;

class Admin
{
    public function index()
    {
        header('location: /admin/dashboard');
        exit;
    }

    public function dashboard()
    {
        echo view('pages.admin.dashboard');
    }
}

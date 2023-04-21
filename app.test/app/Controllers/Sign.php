<?php

namespace App\Controllers;

use \App\Helpers\Http;

class Sign
{
    public function index()
    {
        header('location: /sign/signin');
        exit();
    }

    public function signin()
    {
        // $data = new \App\Models\SignModel();
        // $status = 200;

        // $this->template->render_page('/sign/signin.php', [
        //     'status' => $status,
        //     'message' => Http::status_message($status),
        //     'data' => $data->show_databases()
        // ]);
        echo 'signin';
    }

    public function signout()
    {
        // $this->template->render_page('/sign/signout.php');
    }

    public function signup()
    {
        // $this->template->render_page('/sign/signup.php');
    }

    public function welcome()
    {
        // $this->template->render_page('/sign/welcome.php');
    }

    public function farewell()
    {
        // $this->template->render_page('/sign/farewell.php');
    }
}

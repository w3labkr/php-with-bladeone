<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Interfaces\ControllerInterface;
use App\Models\Users;
use PHPMailer\PHPMailer\Exception;

class ForgotUsername extends Controller implements ControllerInterface
{
    public function get()
    {
        $csrf_token = csrf_token();

        echo $this->view('pages.auth.forgot-username', compact('csrf_token'));
    }

    public function post()
    {
        $csrf_token = csrf_token();

        $data = $this->data;
        $post = safety($_POST['forgot-username']);

        $user = (new Users())->findUserByEmail($post['email']);

        if (!$user) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Email is incorrect.'];
        } elseif (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Invalid Email Address.'];
        } else {
            $mailer = mailer()->smtp();
            $mailer->setFrom(config('mail.from.address'), config('mail.from.name'));
            $mailer->addAddress($user['email']);

            $mailer->isHTML(true);
            $mailer->Subject = 'Find your username';

            $mailer->Body = "
                Hi! {$user['nickname']},

                You received this email because we received a request for a username for your account.

                Your username is {$user['username']}.

                If you did not request a username search, no further action is required.

                Thank you!
            ";

            try {
                $mailer->send();
                $data['status'] = 'success';
                $data['message'] = 'Message has been sent';
            } catch (Exception $e) {
                $data['status'] = 'fail';
                $data['errors'][] = ['message' => "Message could not be sent. {$mailer->ErrorInfo}"];
            }
        }

        echo $this->view('pages.auth.forgot-username', compact('csrf_token', 'data'));
    }

    public function patch()
    {
    }

    public function put()
    {
    }

    public function delete()
    {
    }

    public function options()
    {
    }
}

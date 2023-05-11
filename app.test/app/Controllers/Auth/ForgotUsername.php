<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Helpers\Validator;
use App\Interfaces\ControllerInterface;
use App\Models\Users;
use PHPMailer\PHPMailer\Exception;

class ForgotUsername extends Controller implements ControllerInterface
{
    public function get()
    {
        echo $this->view('pages.auth.forgot-username');
    }

    public function post()
    {
        $data = $this->data;
        $post = Validator::safe($_POST['user']);

        $user = (new Users())->findUserByEmail($post['email']);

        if ($user) {
            $mailer = mailer();
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
        } else {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Email not found.'];
        }

        echo $this->view('pages.auth.forgot-username', compact('data'));
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

<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Helpers\Validator;
use App\Interfaces\ControllerInterface;
use App\Models\Users;
use PHPMailer\PHPMailer\Exception;

class ForgotPassword extends Controller implements ControllerInterface
{
    public function get()
    {
        $csrf_token = csrf_token();

        echo $this->view('pages.auth.forgot-password', compact('csrf_token'));
    }

    public function post()
    {
        $csrf_token = csrf_token();

        $data = $this->data;
        $post = Validator::safe($_POST['forgot-password']);

        $user = (new Users())->findUserByUsername($post['username']);
        $token = generate_token();

        if (!$user) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Your username is incorrect.'];
        } elseif (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            $data['status'] = 'fail';
            $data['errors'][] = ['message' => 'Your registered email is invalid.'];
        } else {
            $mailer = mailer()->smtp();
            $mailer->setFrom(config('mail.from.address'), config('mail.from.name'));
            $mailer->addAddress($user['email']);

            $mailer->isHTML(true);
            $mailer->Subject = 'Reset your password';

            $mailer->Body = "
                Hi! {$user['nickname']},

                You are receiving this email because we have received a password reset request for your account.

                Reset your password
                code: {$token}.

                If you have not requested a password reset, no further action is required.

                Thank you!
            ";

            try {
                $mailer->send();

                session()->set('userid', $user['id']);
                session()->set('email', $user['email']);
                session()->set('reset_password_token', $token);

                header('location: /reset-password');
                exit;
            } catch (Exception $e) {
                $data['status'] = 'fail';
                $data['errors'][] = ['message' => "Message could not be sent. {$mailer->ErrorInfo}"];
            }
        }

        echo $this->view('pages.auth.forgot-password', compact('csrf_token', 'data'));
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

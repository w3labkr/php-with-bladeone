<?php

namespace App\Helpers;

/*
 * PHPMailer – A full-featured email creation and transfer class for PHP.
 *
 * The classic email sending library for PHP
 *
 * @see https://github.com/PHPMailer/PHPMailer
 *
 * @license GNU Lesser General Public License v2.1
 */

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    public function smtp(): PHPMailer
    {
        // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        // Server settings
        $mail->SMTPDebug = false; // SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = config('mail.mailers.smtp.host');
        $mail->SMTPAuth = true;
        $mail->Username = config('mail.mailers.smtp.username');
        $mail->Password = config('mail.mailers.smtp.password');
        $mail->CharSet = config('mail.mailers.smtp.charset');

        switch (config('mail.mailers.smtp.encryption')) {
            case 'ssl':
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;
                break;
            case 'tls':
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                break;
        }

        return $mail;
    }
}

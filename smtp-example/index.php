<?php

require_once __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

function sendEmail() {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = $_ENV['SMTP_HOST'];
        $mail->Port = $_ENV['SMTP_PORT'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SMTP_USER'];
        $mail->Password = $_ENV['SMTP_PASSWORD'];
        $mail->SMTPSecure = false;
        $mail->SMTPAutoTLS = false;

        $mail->setFrom($_ENV['FROM_EMAIL']);
        $mail->addAddress($_ENV['TO_EMAIL']);

        $mail->Subject = 'Test Email from Keplers SMTP';
        $mail->Body = '<p>This is a <strong>test email</strong> sent via Keplers.email SMTP service.</p>';
        $mail->AltBody = 'This is a test email sent via Keplers.email SMTP service.';
        $mail->isHTML(true);

        $mail->send();

        echo "Email sent successfully!\n";
        echo "Message ID: " . $mail->getLastMessageID() . "\n";
    } catch (Exception $e) {
        echo "Error sending email: {$mail->ErrorInfo}\n";
    }
}

sendEmail();

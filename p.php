<?php
// Load Composer's autoloader
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Sender's email and name
$sender_email = 'your_email@example.com';  // Sender's email
$sender_name = 'Your Name';               // Sender's name

// Recipient's email
$recipient_email = 'rji245412@gmail.com';
$recipient_name = 'muchus';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                           // Set mailer to use SMTP
    $mail->Host       = 'smtp.example.com';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                  // Enable SMTP authentication
    $mail->Username   = 'your_email@example.com';               // SMTP username
    $mail->Password   = 'your_password';                       // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        // Enable TLS encryption
    $mail->Port       = 587;                                   // TCP port to connect to

    // Sender
    $mail->setFrom($sender_email, $sender_name);               // Sender's email and name

    // Recipients
    $mail->addAddress($recipient_email, $recipient_name);      // Add a recipient

    // Content
    $mail->isHTML(true);                                       // Set email format to HTML
    $mail->Subject = 'how r u';
    $mail->Body    = 'This is a <b>test email</b> sent via SMTP using PHPMailer!';

    // Send the email
    $mail->send();
    echo 'Email has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

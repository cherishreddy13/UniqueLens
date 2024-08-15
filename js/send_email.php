<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader (if using Composer)
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'reddycherish76@gmail.com';               // SMTP username
    $mail->Password   = 'sbdd iuhc fzed vpjg';                  // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           // Enable TLS encryption
    $mail->Port       = 587;                                    // TCP port to connect to

    // Recipients
    $mail->setFrom('reddycherish76@gmail.com', 'Mailer');
    $mail->addAddress('reddycherish76@gmail.com');                 // Add a recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'Quote Request';

    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $placeofshoot = htmlspecialchars($_POST['placeofshoot']);
    $budget = htmlspecialchars($_POST['budget']);

    // Email body
    $mail->Body    = "<h1>Quote Request</h1>
                      <p><b>Name:</b> $name</p>
                      <p><b>Email:</b> $email</p>
                      <p><b>Place of Shoot:</b> $placeofshoot</p>
                      <p><b>Budget:</b> $budget</p>";

    // Send email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
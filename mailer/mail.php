<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require __DIR__ . '/../vendor/autoload.php'; // Adjust this path if necessary

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
    $mail->Username = 'mohamedyasser.alkotp@gmail.com';       // SMTP username
    $mail->Password = 'zbhd afde qglf ysut';                  // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
    $mail->Port = 465;                                    // TCP port to connect to

    // Content format
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->CharSet = 'UTF-8';
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
}
?>
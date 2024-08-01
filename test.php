

<?php

// include "mail.php";

// $mail->setFrom('mohamedyasser.alkotp@gmail.com', 'BEA Shop');

// $mail->addAddress('mohamedyasser.alkotp@gmail.com');

// $mail->Subject = 'Here is the subject';
// $mail->Body = 'This is the HTML message body <b>in bold!</b>';


// $mail->send();

// if (!$mail->send()) {
//     echo 'Message could not be sent.';
//     echo 'Mailer Error: ' . $mail->ErrorInfo;
// } else {
//     echo 'Message has been sent';
// }

// connect.php

// Include the database connection
include "connect.php";

// Include the PHPMailer setup
include "mailer/mail.php";

// Make sure $user_verifycode is defined
$user_verifycode = '123456'; // Example value, you should set this appropriately

// Ensure that $mail is properly initialized before using it
if (isset($mail)) {
    $mail->setFrom('mohamedyasser.alkotp@gmail.com', 'BEA Shop');
    $mail->addAddress('mohamedyasser.alkotp@gmail.com');
    $mail->Subject = 'Hi BEA shop';
    $mail->Body = "Your Verification Code: $user_verifycode";

    try {
        if ($mail->send()) {
            echo 'Message has been sent';
        } else {
            echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
} else {
    echo 'Mailer could not be initialized.';
}

// Check database connection
if ($con->errorCode()) {
    echo "Connection failed: " . $con->errorInfo()[2];
} else {
    echo "Connected successfully to the database.";
}
?>



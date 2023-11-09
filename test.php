
<?php


include "connect.php";




sendGCM("hello Test ", "welcome to BEA Shop", "users", "", "");

sendGCM("hello Test ", "welcome to BEA Shop", "users98", "", "");






// include"mail.php";

// $mail->setFrom('mohamedyasser.alkotp@gmail.com', 'BEA Shop');

// $mail->addAddress('mohamedyasser.alkotp@gmail.com'); 

// $mail->Subject = 'Here is the subject';
// $mail->Body    = 'This is the HTML message body <b>in bold!</b>';


// $mail->send();

// if(!$mail->send()) {
//     echo 'Message could not be sent.';
//     echo 'Mailer Error: ' . $mail->ErrorInfo;
// } else {
//     echo 'Message has been sent';
// }

?>
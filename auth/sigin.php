

<?php

include "../mailer/mail.php";
include "../connect.php";


$user_name = filterRequest("user_name");
$user_email = filterRequest("user_email");
$user_password = sha1(filterRequest("user_password"));
$user_phone = filterRequest("user_phone");
$user_verifycode = rand(10000,99999);



$stmt = $con->prepare("SELECT * FROM users WHERE user_email = ? OR user_phone = ?");
$stmt->execute(array($user_email, $user_phone));


$count = $stmt->rowCount();

if($count> 0){

    printFailure("the Phone or email was used");

}else{

   $table = "users";

   $data = array(
        "user_name" => $user_name,
        "user_email" => $user_email,
        "user_password" => $user_password,
        "user_phone" => $user_phone,
        "user_verifycode" => $user_verifycode,
    );



    insertData ($table,$data);


$mail->setFrom('mohamedyasser.alkotp@gmail.com', 'BEA Shop');

$mail->addAddress($user_email); 

$mail->Subject = 'Hi BEA shop';
$mail->Body = "Your Verification Code: $user_verifycode";


$mail->send();

    
  
}


?>


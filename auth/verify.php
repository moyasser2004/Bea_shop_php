


<?php
include "../connect.php";



$user_email = filterRequest("user_email");
$user_verifycode = filterRequest("user_verifycode");



$stmt=$con->prepare("SELECT * FROM users WHERE user_email = ? AND user_verifycode = ? ");

$stmt->execute(array($user_email,$user_verifycode));

$count=$stmt->rowCount();

if($count > 0) {

  $stmt = $con->prepare("UPDATE `users` SET `user_approve`='1' WHERE  `user_email`=? ");
    $stmt->execute(array($user_email));

  echo json_encode(array("status"=>"success",));
}else{
  printFailure("Error in Verification Code");
}


?>


<?php


include '../connect.php';

$user_email=filterRequest("user_email");
$user_password=sha1(filterRequest("user_password"));



$stmt=$con->prepare("UPDATE `users` SET `user_password`=? WHERE  `user_email`=? ");
$stmt->execute(array($user_password,$user_email));


echo json_encode(array("status"=>"success"));



?>
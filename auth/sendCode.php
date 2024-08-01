<?php
include '../connect.php';


$user_email = filterRequest("user_email");
$user_verifycode = rand(10000,99999);

$stmt = $con->prepare("SELECT * FROM users WHERE user_email = ?");
$stmt->execute(array($user_email));

$count = $stmt->rowCount();

if ($count > 0) {
    $stmt = $con->prepare("UPDATE users SET user_verifycode = ? WHERE user_email = ?");
    $stmt->execute(array($user_verifycode, $user_email));
    if ($stmt->rowCount() > 0) {
        echo json_encode(array("status"=>"success","user_verifycode"=>$user_verifycode));
    } else {
        echo json_encode(array("status"=>"error","message"=>"Failed to update verification code"));
    }
} else {
    echo json_encode(array("status"=>"error","message"=>"User not found"));
}

?>
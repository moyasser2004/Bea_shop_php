




<?php
include "../connect.php";

$user_name = filterRequest("user_name");
$user_email = filterRequest("user_email");

$stmt = $con->prepare("SELECT * FROM users WHERE user_name = ? AND user_email = ?");
$stmt->execute(array($user_name, $user_email));

$count = $stmt->rowCount();
if ($count > 0) {
    $table = "users";
    deleteData($table, $user_name, $user_email);
} else {
    printFailure("The username or email was not found.");
}
?>
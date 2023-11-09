
<?php


include "../connect.php";


$user_email=filterRequest("user_email");
$user_password=sha1(filterRequest("user_password"));

$table="users";
$value=array($user_email,$user_password);

$where="  `user_email` = ?  And `user_password` =? ";


getData($table,$where,$value);


?>
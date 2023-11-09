



<?php

include '../connect.php';

$user_email=filterRequest("user_email");

$table="users";
$where="user_email = ? And `user_approve`= '1' ";
$value=array($user_email);

$count = getAllData($table,$where,$value);


?>
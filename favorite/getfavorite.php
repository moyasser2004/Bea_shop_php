


<?php

include "../connect.php";

$user_id = filterRequest("user_id");
$table="favorite";
$where="favorite_user_id = ?";
$value=array($user_id);

getAllData($table,$where,$value);

?>



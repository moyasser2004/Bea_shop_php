



<?php

include "../connect.php";

$user_id = filterRequest("user_id");
$item_id = filterRequest("item_id");

$table=" favorite ";
$where=" favorite_items_id = $item_id  AND favorite_user_id = $user_id  ";


 deleteData($table,$where);
?>

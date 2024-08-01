

<?php

include "../connect.php";

$items_id = filterRequest("items_id");
$items_image = filterRequest("items_image");

$table = "items";
$where = "items_id = $items_id";

$count = deleteData($table, $where);
sendGCM("Hi BEA shop", "Sorry delete some product", "users", "", "items");

if($count > 0 ){
    deleteFile("../upload", $items_image);
}


?>
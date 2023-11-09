

<?php

include "../connect.php";

$new_items_rate = filterRequest("new_items_rate");
$cart_item_id = filterRequest("cart_item_id");
$table = "items";

$data = array(
 "items_rate" => $new_items_rate
);

$where = "items_id  = $cart_item_id ";

updateData($table, $data, $where, $json = true);


?>
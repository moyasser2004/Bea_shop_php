<?php

include "../connect.php";


$cart_id = filterRequest("cart_id");
$cart_item_delivery = filterRequest("cart_item_delivery");
$cart_user_id = filterRequest("cart_user_id");


$table = "cart";

$data = array(
    "cart_item_delivery" => $cart_item_delivery
);


$where = "cart_id = $cart_id ";

$count = updateData($table, $data, $where, $json = false);

if ($count > 0) {
    sendGCM("Hi BEA shop", "Your order is Approved", "users$cart_user_id", "$cart_id", "orders");
    echo json_encode(array("status" => "Accepted"));
} else {
    echo json_encode(array("status" => "Failed"));
}


?>


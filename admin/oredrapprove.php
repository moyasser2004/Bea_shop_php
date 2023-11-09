

<?php


include "../connect.php";

$user_id = filterRequest("user_id");
$cart_id = filterRequest("cart_id");

$table = "cart";
$data = array(
    "cart_order_state"=> 1
);

$where = "cart_id =$cart_id AND cart_order_state != 1 ";

$count= updateData($table, $data, $where, $json = true);

if( $count >0 ){
    sendGCM("Hi BEA shop", "Your order is Approved", "users$user_id", "$cart_id", "orders");
}



?>
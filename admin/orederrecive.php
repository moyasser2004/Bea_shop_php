
<?php


include "../connect.php";

$user_id = filterRequest("user_id");
$cart_id = filterRequest("cart_id");

$table = "cart";
$data = array(
    "cart_order_state"=> 3
);

$where = "cart_id =$cart_id AND cart_order_state != 3 ";

$count= updateData($table, $data, $where, $json = true);

if( $count >0 ){
    sendGCM("Hi BEA shop", "Your order has be delivered", "users$user_id", "$cart_id", "orders");
}



?>
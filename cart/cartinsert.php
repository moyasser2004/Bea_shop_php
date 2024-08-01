

<?php

include "../connect.php";


$cart_user_id = filterRequest("cart_user_id");
$cart_item_id = filterRequest("cart_item_id");
$cart_item_count = filterRequest("cart_item_count");
$cart_address_id = filterRequest("cart_address_id");
$cart_promo_code_discount = filterRequest("cart_promo_code_discount");
$cart_methods = filterRequest("cart_methods");

$table= "cart";

 $data = array(
    "cart_user_id" => $cart_user_id,
    "cart_item_id" => $cart_item_id,
    "cart_item_count" => $cart_item_count,
    "cart_address_id" => $cart_address_id,
    "cart_promo_code_discount" => $cart_promo_code_discount,
    "cart_methods" => $cart_methods,
 );
 
 $count = insertData ($table,$data,);

 if( $count > 0 ) {
  
  $items_count = filterRequest("items_count");  
  $table = "items";


  $data = array(
    "items_count" => $items_count,
    "item_top_selling" => 1
   );

  $where = "items_id   = $cart_item_id ";
  sendGCM("Hi BEA shop", "New Order have been added !! id:$cart_item_id", "admin", "$cart_item_id", "orders");
   updateData($table, $data, $where, $json = false);

 }



if($cart_item_count == "0") {
    deleteData($table,"cart_user_id = $cart_user_id  AND cart_item_id = $cart_item_id ");

}

?>



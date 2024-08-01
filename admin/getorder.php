
<?php

include "../connect.php";


$stmt = $con->prepare("SELECT 
adress.*, 
cart.cart_item_count, 
cart.cart_user_id,
cart.cart_order_state,
cart.cart_promo_code_discount,
cart.cart_methods,
cart.cart_id,
cart.cart_date,
 items.items_name, 
 items.items_owner, 
 items.items_price, 
 items.items_id,
 items.items_discount,
 items.items_image,
 items.items_active,
 items.items_colors,
 items.items_categories,
 users.user_name,
 users.user_phone
FROM 
adress 
INNER JOIN 
cart ON cart.cart_address_id = adress.address_id
INNER JOIN 
 items ON items.items_id = cart.cart_item_id
INNER JOIN 
 users ON users.user_id = cart.cart_user_id
 ORDER by cart.cart_date DESC; 
 ");


$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$count = $stmt->rowCount();

if($count > 0){
    echo json_encode(array("status"=> "success", "data"=>$data));
}else{
    echo json_encode(array("status"=> "failure"));
}








?>
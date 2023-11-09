<?php

include "../connect.php";

$cart_user_id = filterRequest("cart_user_id");

$stmt = $con->prepare("SELECT items.*, cart.* FROM items INNER JOIN cart ON cart.cart_item_id = items.items_id WHERE cart_user_id = :cart_user_id Order BY cart_date DESC ");
$stmt->bindParam(':cart_user_id', $cart_user_id, PDO::PARAM_INT);
$stmt->execute();

if($stmt){
    $count = $stmt->rowCount();
    if($count > 0 ){
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array("status"=>"success","data"=>$data));
    } else {
        echo json_encode(array("status"=>"failure"));
    }
} else {

    echo json_encode(array("status"=>"failure"));
}

?>

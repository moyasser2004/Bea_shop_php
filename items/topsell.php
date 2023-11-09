

<?php

include "../connect.php";


$stmt = $con->prepare("SELECT DISTINCT cart.cart_item_id,  items.*
FROM cart INNER JOIN items
ON  cart.cart_item_id =  items.items_id ORDER By cart.cart_item_count DESC");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$count = $stmt->rowCount();

if( $count >  0 ){
    
    echo json_encode(array("status" =>"success", "data" =>$data));
}else{

    echo json_encode(array("status" =>"failure", ));
}


?>
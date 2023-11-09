

<?php


include "../connect.php";


$cart_id = filterRequest("cart_id");
$cart_item_rate = filterRequest("cart_item_rate");

$cart_item_id = filterRequest("cart_item_id");

$table = "cart";

$data = array(
   "cart_item_rate" => $cart_item_rate
);

$where = "cart_id = $cart_id ";

$count = updateData($table, $data, $where, $json = false);

if($count > 0 ){


$where = "cart_item_id = $cart_item_id ";

$stmt = $con->prepare("SELECT SUM(cart_item_rate)/(COUNT(cart_item_rate )*5) as sum FROM cart WHERE cart_item_id = ? AND cart_item_rate!=0");
$stmt->execute(array($cart_item_id));
$data2 = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode(array("data"=>$data2));


}

?>
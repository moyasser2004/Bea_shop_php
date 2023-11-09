

<?php

include "../connect.php";

$user_id = filterRequest("user_id");
$item_id = filterRequest("item_id");

$table = "favorite";
$data = array(
    "favorite_items_id" => $item_id,
    "favorite_user_id" => $user_id
);

$stmt = $con->prepare("SELECT * FROM $table WHERE favorite_items_id = ? AND favorite_user_id = ?");
$stmt->execute(array($item_id, $user_id));

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "failure"));
} else {
    insertData($table, $data, false);
    echo json_encode(array("status" => "success"));
}

?>


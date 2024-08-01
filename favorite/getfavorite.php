
<?php

include "../connect.php";

$user_id = filterRequest("user_id");


$stmt = $con->prepare("SELECT
favorite.*,
items.*,
GROUP_CONCAT(images.images_name) AS images_list
FROM 
favorite
INNER JOIN 
items ON items.items_id = favorite.favorite_items_id 
LEFT JOIN 
images ON items.items_id = images.images_id  WHERE favorite_user_id =  ?
GROUP BY 
items.items_id ");
$stmt->execute(array($user_id));

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($data as &$item) {
    $item['images_list'] = array_map('trim', explode(',', $item['images_list']));
}

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}



?>




<?php


include "../connect.php";


$stmt = $con->prepare("SELECT
     items.* ,
     GROUP_CONCAT(images.images_name) AS images_list
        FROM items 
     LEFT JOIN images ON items.items_id = images.images_id
        WHERE 
    items.items_top_cart = 1
        GROUP BY 
    items.items_id"
);

$stmt->execute();

$itemNow = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($itemNow as &$item) {
    $item['images_list'] = array_map('trim', explode(',', $item['images_list']));
}

echo json_encode(array("status" => "success", "data" => $itemNow));

?>
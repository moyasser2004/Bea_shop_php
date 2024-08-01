<?php
 
 include "../connect.php";

$items_category = filterRequest("items_category");

$stmt = $con->prepare(" SELECT
        items.*,
 GROUP_CONCAT(DISTINCT images.images_name) AS images_list
    FROM 
        items
    LEFT JOIN 
        images ON items.items_id = images.images_id  
    WHERE 
            items_categories = :items_categories 
    GROUP BY 
        items.items_id
");

$stmt->execute(array(':items_categories' => $items_category));

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



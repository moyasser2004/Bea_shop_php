


<?php

include "../connect.php";


$allData=array();

$status="success";

$allData["status"]=$status;
$table="categories";
$table2="items";

//categories
$categories=getAllData($table,null,null,false);


//itemView
$stmt = $con->prepare("SELECT
       items.* ,
       GROUP_CONCAT(images.images_name) AS images_list
        FROM items 
      LEFT JOIN images ON items.items_id = images.images_id
      WHERE items.items_discount > 0
        GROUP BY items.items_id");

$stmt->execute();

$itemView = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($itemView as &$item) {
  $item['images_list'] = array_map('trim', explode(',', $item['images_list']));
}


//itemNow
$stmt = $con->prepare("SELECT
     items.* ,
     GROUP_CONCAT(images.images_name) AS images_list
        FROM items 
     LEFT JOIN images ON items.items_id = images.images_id
        GROUP BY items.items_id
     ORDER BY items_date  DESC LIMIT 100 "
);

$stmt->execute();

$itemNow = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($itemNow as &$item) {
  $item['images_list'] = array_map('trim', explode(',', $item['images_list']));
}

 
$allData["categories"]=$categories;
$allData["itemView"]=$itemView;
$allData["itemNow"]=$itemNow;

echo  json_encode($allData);

?>
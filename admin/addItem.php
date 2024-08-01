<?php

include "../connect.php";


$items_name = filterRequest("items_name");
$items_name_ar = filterRequest("items_name_ar");

$items_des = filterRequest("items_des");
$items_des_ar = filterRequest("items_des_ar");

$items_count = filterRequest("items_count");
$items_price = filterRequest("items_price");

$items_active = filterRequest("items_active");

$items_categories = filterRequest("items_categories");
$items_discount = filterRequest("items_discount");

$items_rate = filterRequest("items_rate");
$items_colors = filterRequest("items_colors");

$item_top = filterRequest("item_top");
$items_owner = filterRequest("items_owner");

$items_image = imageUpload("file");

$items_image = filterRequest("items_image");



$table = "items";

$data = array(
    "items_name" => $items_name,
    "items_name_ar" => $items_name_ar,

    "items_des" => $items_des,
    "items_des_ar" => $items_des_ar,

    "items_count" => $items_count,
    "items_price" => $items_price,

    "items_active" => $items_active,
    "items_categories" => $items_categories,

    "items_discount" => $items_discount,
    "items_rate" => $items_rate,

    "items_colors" => $items_colors,
    "item_top" => $item_top,

    "items_image" => $items_image,

    "items_owner" => $items_owner,

);

sendGCM("Hi BEA shop", "New product been added Go see it !", "users", "$items_name", "items");

//if($items_image!="failure"){

insertData($table, $data);


// }else{
//     echo json_encode(array("status" => "failure"));
// }



?>
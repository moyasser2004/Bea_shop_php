<?php

include "../connect.php";

$categories_name = filterRequest("categories_name");
$categories_name_ar = filterRequest("categories_name_ar");


$categories_icons = imageUpload("file1");
$categories_images = imageUpload("file2");

$categories_icons = filterRequest("categories_icons");
$categories_images = filterRequest("categories_images");

$table = "categories";

$data = array(

    "categories_name" => $categories_name,
    "categories_name_ar" => $categories_name_ar,
    "categories_icons" => $categories_icons,
    "categories_images" => $categories_images,

);

// if($categories_icons != "failure" ){

sendGCM("Hi BEA shop", "New category been added Go see it !", "users", "$categories_name", "category");

insertData($table, $data);

// }


?>
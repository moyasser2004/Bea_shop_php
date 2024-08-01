




<?php

include "../connect.php";

$categories_id = filterRequest("categories_id");
$categories_icons = filterRequest("categories_icons");
$categories_images = filterRequest("categories_images");


$table = "categories";

$where = "categories_id = $categories_id";

$count = deleteData($table, $where);

if($count > 0 ){

    deleteFile("../upload", $categories_icons);
    deleteFile("../upload", $categories_images);
 
}


?>
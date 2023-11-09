


<?php

include "../connect.php";


$allData=array();

$status="success";

$allData["status"]=$status;
$table="categories";
$table2="items";

$categories=getAllData($table,null,null,false);

$itemView=getAllData($table2,"items_discount > 0 && items_active=1 ",null,false);

$stmt = $con->prepare("SELECT * FROM items Where items_active=1 ORDER BY items_date DESC LIMIT 50  " );
$stmt->execute();
$itemNow=$stmt->fetchAll(PDO::FETCH_ASSOC);

 
$allData["categories"]=$categories;
$allData["itemView"]=$itemView;
$allData["itemNow"]=$itemNow;

echo  json_encode($allData);

?>
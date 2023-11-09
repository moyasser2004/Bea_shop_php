


<?php


include "../connect.php";

$search = filterRequest("search");
$table = "items";

$where = "items_name LIKE :search OR items_name_ar LIKE :search";
$values = array(':search' => '%' . $search . '%');

getAllData($table, $where, $values, true);


?>
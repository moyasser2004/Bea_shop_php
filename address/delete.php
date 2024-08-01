

<?php

include "../connect.php";


$thresholdDate = date('Y-m-d H:i:s', strtotime('-15 days'));

$table = "adress";
$where = "address_date < '$thresholdDate'";

deleteData($table, $where, $json = true);


?>
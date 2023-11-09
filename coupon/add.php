
<?php

include "../connect.php";

$coupon_name = filterRequest("coupon_name");
$coupon_count = filterRequest("coupon_count");


$table = "coupone";
$where = "coupon_name = '$coupon_name' AND coupon_count > 0 ";


$data = array(
    "coupon_count" => $coupon_count,
);

updateData($table, $data, $where, $json = true);



?>


<?php

include "../connect.php";

$coupon_name = filterRequest("coupon_name");
$time = date("Y-m-d H:i:s");

$table = "coupone";
$where = "coupon_name = '$coupon_name' AND coupon_date > '$time' AND coupon_count > 0 ";

getData($table, $where);




?>

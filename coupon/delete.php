


<?php


 include "../connect.php";

 $coupon_name = filterRequest("coupon_name");
  
 $table = "coupone";
 $where = "coupon_name = $coupon_name' ";

 
 deleteData($table, $where, $json = true);


?>
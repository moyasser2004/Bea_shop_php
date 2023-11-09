


<?php

include "../connect.php";


$cart_user_id = filterRequest("cart_user_id");



$table= "cart";

getAllData($table,"cart_user_id = $cart_user_id  ");

?>






<?php
 

 include "../connect.php";

 $table="items";
 
 $items_category=filterRequest("items_category");

 $where="items_categories=$items_category";

 getAllData($table,$where,null,true);


?>


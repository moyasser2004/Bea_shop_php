
<?php

include "../connect.php";


$address_user_id = filterRequest("address_user_id");
$address_city = filterRequest("address_city");
$address_street = filterRequest("address_street");
$address_governoral = filterRequest("address_governoral");
$address_phone = filterRequest("address_phone");

$table = "adress";


$data = array(
    "address_user_id" => $address_user_id,
    "address_street" => $address_street,
    "address_city" => $address_city,
    "address_governoral" => $address_governoral,
    "address_phone" => $address_phone,
);

 $count = insertData($table, $data, $json = false);

 if($count > 0){

    $stmt = $con->prepare("SELECT * FROM adress WHERE address_city = :address_city AND address_street = :address_street AND address_governoral = :address_governoral AND address_phone = :address_phone  ORDER BY address_id DESC LIMIT 1");

    $stmt->bindParam(':address_city', $address_city, PDO::PARAM_STR);
    $stmt->bindParam(':address_street', $address_street, PDO::PARAM_STR);
    $stmt->bindParam(':address_governoral', $address_governoral, PDO::PARAM_STR);
    $stmt->bindParam(':address_phone', $address_phone, PDO::PARAM_STR);
    
    $stmt->execute();
    
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    
    if ($count > 0) {
        echo json_encode(array("status" => "success", "data" => $data));
    }

 }




?>


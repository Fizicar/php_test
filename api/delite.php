<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
 
// include database and object file
include_once 'database.php';
include_once 'product.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$sekcija = new Sekcija($db);
 
// get product id
$data = json_decode(file_get_contents("php://input"));
 
// set product id to be deleted
$sekcija->id = $data->id;
 
// delete the product
if($sekcija->delete()){
    echo '{';
        echo '"message": "Sekcija was deleted."';
    echo '}';
}
 
// if unable to delete the sekcija
else{
    echo '{';
        echo '"message": "Unable to delete object."';
    echo '}';
}
?>
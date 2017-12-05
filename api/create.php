<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once 'database.php';
 
// instantiate sekcija object
include_once 'sekcija.php';
 
$database = new Database();
$db = $database->getConnection();
 
$sekcija = new sekcija($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set sekcija property values
$sekcija->id = $data->id;
$sekcija->edit = date('Y-m-d H:i:s');
$sekcija->img1 = $data->img1;
$sekcija->img2 = $data->img2;
$sekcija->img3 = $data->img3;
$sekcija->subtitle = $data->subtitle;
$sekcija->title = $data->title;
$sekcija->txt1 = $data->txt1;
$sekcija->txt2 = $data->txt2;
$sekcija->txt3 = $data->txt3;
$sekcija->txt4 = $data->txt4;
$sekcija->txt5 = $data->txt5;
 
// create the sekcija
if($sekcija->create()){
    echo '{';
        echo '"message": "sekcija was created."';
    echo '}';
}
 
// if unable to create the sekcija, tell the user
else{
    echo '{';
        echo '"message": "Unable to create sekcija."';
    echo '}';
}
?>
<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once 'database.php';
include_once 'sekcija.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare sekcija object
$sekcija = new sekcija($db);
 
// get id of sekcija to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of sekcija to be edited
/* $sekcija->id = $data->id; */
 
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
 
// update the sekcija
if($sekcija->update()){
    echo '{';
        echo '"message": "sekcija was updated."';
    echo '}';
}
 
// if unable to update the sekcija, tell the user
else{
    echo '{';
        echo '"message": "Unable to update sekcija."';
    echo '}';
}
?>
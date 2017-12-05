<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once 'database.php';
include_once 'sekcija.php';
 
// instantiate database and sekcija object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$sekcija = new Sekcija($db);
 
// query sekcije
$stmt = $sekcija->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // sekcije array
    $sekcije_arr=array();
    $sekcije_arr["podaci"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $sekcija_item=array(
            "sekcija_id" => $id,
            "id_last_edit" => $edit,
            "slika1" => $img1,
            "slika2" => $img2,
            "slika3" => $img3,
            "podnaslov" => $subtitle,
            "naslov" => $title,
            "text_1" => html_entity_decode($txt1),
            "text_2" => html_entity_decode($txt2),
            "text_3" => html_entity_decode($txt3),
            "text_4" => html_entity_decode($txt4),
            "text_5" => html_entity_decode($txt5)
        );
 
        array_push($sekcije_arr["podaci"], $sekcija_item);
    }
 
    echo json_encode($sekcije_arr);
}
 
else{
    echo json_encode(
        array("message" => "Sekcije Not found.")
    );
}
?>
<?php
class Admin{
 
    // database connection and table name
    private $conn;
    private $table_name = "admin";
 
    // object properties
    public $id;
    public $ime_prezime;
    public $uloga;
    public $username;
    public $sifra;
    public $zadnji_login;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function readAll(){
        //select all data
        $query = "SELECT
                    id, ime_prezime, uloga, username, sifra, zadnji_login
                FROM
                     $this->table_name 
                ORDER BY
                    id";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }
        // create admin
    function create(){
    
        // query to insert record
        $query = "INSERT INTO
                     . $this->table_name .
                SET
                    id=:id, ime_prezime=:ime_prezime, uloga=:uloga, username=:username, sifra=:sifra, zadnji_login=:zadnji_login";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->ime_prezime=htmlspecialchars(strip_tags($this->ime_prezime));
        $this->uloga=htmlspecialchars(strip_tags($this->uloga));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->sifra=htmlspecialchars(strip_tags($this->sifra));
        $this->zadnji_login=htmlspecialchars(strip_tags($this->zadnji_login));
    
        // bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":ime_prezime", $this->ime_prezime);
        $stmt->bindParam(":uloga", $this->uloga);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":sifra", $this->sifra);
        $stmt->bindParam(":zadnji_login", $this->zadnji_login);
        // execute query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

// delete the product
function delete(){
 
    // delete query
    $query = "DELETE FROM  . $this->table_name .  WHERE id = ?";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}

}
?>
<?php
class Sekcija{
 
    // database connection and table name
    private $conn;
    private $table_name = "sekcije";
 
    // object properties
    public $id;
    public $edit;
    public $img1;
    public $img2;
    public $img3;
    public $subtitle;
    public $title;
    public $txt1;
    public $txt2;
    public $txt3;
    public $txt4;
    public $txt5;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read sekcije
    function read(){
    
        // select all query
        $query = "SELECT * FROM
                    $this->table_name
                  ORDER BY $id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
    
    
    // create sekcija
    function create(){
    
        // query to insert record
        $query = "INSERT INTO
                    $this->table_name
                SET
                    id=:id, edit=:edit, img1=:img1, img2=:img2, img3=:img3, subtitle=:subtitle, title=:title, txt1=:txt1, txt2=:txt2, txt3=:txt3, txt4=:txt4, txt5=:txt5";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->edit=htmlspecialchars(strip_tags($this->edit));
        $this->img1=htmlspecialchars(strip_tags($this->img1));
        $this->img2=htmlspecialchars(strip_tags($this->img2));
        $this->img3=htmlspecialchars(strip_tags($this->img3));
        $this->subtitle=htmlspecialchars(strip_tags($this->subtitle));
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->txt1=htmlspecialchars(strip_tags($this->txt1));
        $this->txt2=htmlspecialchars(strip_tags($this->txt2));
        $this->txt3=htmlspecialchars(strip_tags($this->txt3));
        $this->txt4=htmlspecialchars(strip_tags($this->txt4));
        $this->txt5=htmlspecialchars(strip_tags($this->txt5));
        
        // bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":edit", $this->edit);
        $stmt->bindParam(":img1", $this->img1);
        $stmt->bindParam(":img2", $this->img2);
        $stmt->bindParam(":img3", $this->img3);
        $stmt->bindParam(":subtitle", $this->subtitle);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":txt1", $this->txt1);
        $stmt->bindParam(":txt2", $this->txt2);
        $stmt->bindParam(":txt3", $this->txt3);
        $stmt->bindParam(":txt4", $this->txt4);
        $stmt->bindParam(":txt5", $this->txt5);
    
        // execute query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    
    // update the sekcija
    function update(){
    
        // update query
        $query = "UPDATE
                     $this->table_name
                SET
                    edit=:edit, 
                    img1=:img1, 
                    img2=:img2, 
                    img3=:img3, 
                    subtitle=:subtitle, 
                    title=:title, 
                    txt1=:txt1, 
                    txt2=:txt2, 
                    txt3=:txt3, 
                    txt4=:txt4, 
                    txt5=:txt5
                WHERE
                    id = :id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
       // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->edit=htmlspecialchars(strip_tags($this->edit));
        $this->img1=htmlspecialchars(strip_tags($this->img1));
        $this->img2=htmlspecialchars(strip_tags($this->img2));
        $this->img3=htmlspecialchars(strip_tags($this->img3));
        $this->subtitle=htmlspecialchars(strip_tags($this->subtitle));
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->txt1=htmlspecialchars(strip_tags($this->txt1));
        $this->txt2=htmlspecialchars(strip_tags($this->txt2));
        $this->txt3=htmlspecialchars(strip_tags($this->txt3));
        $this->txt4=htmlspecialchars(strip_tags($this->txt4));
        $this->txt5=htmlspecialchars(strip_tags($this->txt5));
        
        // bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":edit", $this->edit);
        $stmt->bindParam(":img1", $this->img1);
        $stmt->bindParam(":img2", $this->img2);
        $stmt->bindParam(":img3", $this->img3);
        $stmt->bindParam(":subtitle", $this->subtitle);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":txt1", $this->txt1);
        $stmt->bindParam(":txt2", $this->txt2);
        $stmt->bindParam(":txt3", $this->txt3);
        $stmt->bindParam(":txt4", $this->txt4);
        $stmt->bindParam(":txt5", $this->txt5);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    
    // delete the product
    function delete(){
    
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    
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
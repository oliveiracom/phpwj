<?php
class Category
{
    public $cat_id;
    public $name;
    public $code;

    private $conn;
    private $cat_table = "categories";

    public function __construct($db){
        $this->conn = $db;
    }
     
    public function listCategories() {
        $sql = "SELECT * FROM ". $this->cat_table ;
        
        $run = $this->conn->prepare($sql);
        $run->execute();    
        return $run;
    }

    public function showCategory($id) {
        $sql = "SELECT * FROM ". $this->cat_table ." WHERE id = $id LIMIT 0,1"; //WHERE id = $id

        $run = $this->conn->prepare($sql);
        $run->execute();
        return $run;
    }

    public function addCategory($params) {
        $sql = "INSERT INTO ". $this->cat_table ." (name, code) VALUES ('".$params->name."','".$params->code."')"; 

        $run = $this->conn->prepare($sql);
        $run->execute();

        error_log($myMessage, 3, 'my/file/path/log.txt');
        
        return $run;
    }

    public function editCategory($params) {       

        $sql = "UPDATE ". $this->cat_table ."
        SET 
            'name' = 'Cadimia',
            'code' = 10
        WHERE
            'id' = 9 ";
        
        $run = $this->conn->prepare($sql);
        $run->execute();    
        return $run;
    }

    public function deleteCategory($id) {
        $sql = "DELETE FROM ". $this->cat_table ." WHERE id = $id";

        $run = $this->conn->prepare($sql);
        $run->execute();    
        return $run;
    }
}
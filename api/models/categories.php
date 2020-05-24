<?php
include_once '../data/configs.php';

class CategoryItem
{
    public $cat_id;
    public $name;
    public $code;
     
    public function add() // validate token
    {
        $itemArray = $this->toArray();

        $sql = "INSERT INTO categories (name, code) VALUES ('".$this->name."','".$this->code."')"; 
        
        $success = $conn->exec($sql); //sql query

        return $itemArray;
    }
     
    public function toArray()
    {
        return array(
            'name' => $this->name,
            'code' => $this->code
        );
    }
}
<?php
class Products
{
    private $conn;
    private $prod_table = "products";
    private $cat_table = "categories";

    public $id;
    public $name;
    public $sku;
    public $price;
    public $description;
    public $qtd;
    public $categories;

    public function __construct($db){
        $this->conn = $db;
    }

    public function listAll() {
        $sql = "SELECT * FROM products";

        $run = $this->conn->prepare($sql);
        $run->execute();    
        return $run;
    }

    public function showProduct($id) {
        
        $sql = "SELECT * FROM ". $this->prod_table ." WHERE id = $id ";

        // c.name AS Category---- INNER JOIN categories c
        // ON c.id = 2
        // WHERE c.id IN ( f.categories )";

        //ON c.id = f.categories
        // WHERE c.id IN (2,3)";

        $run = $this->conn->prepare($sql);
        $run->execute();
        return $run;
    }

    public function addProduct($params) {
         $sql = "INSERT INTO ". $this->prod_table ." (name, sku, price, description, qtd, categories)
        VALUES 
        ('".$params->name."',
            '".$params->sku."',
            '".$params->price."',
            '".$params->description."',
            '".$params->qtd."',
            '".$params->categories."'
        )";

        $run = $this->conn->prepare($sql);
        $run->execute();    
        return $run;

    }

    public function editProduct($params) {
        $sql = "UPDATE ". $this->prod_table ." SET 
        name = '".$params->name."',
        sku = '".$params->sku."',
        description = '".$params->description."',
        price = ".$params->price.",
        qtd = ".$params->qtd.",
        categories = '".$params->categories."'
        WHERE id = ".$params->id;

        $run = $this->conn->prepare($sql);
        $run->execute();    
        return $run;
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM ". $this->prod_table ." WHERE id = $id";

        $run = $this->conn->prepare($sql);
        $run->execute();    
        return $run;
    }

}
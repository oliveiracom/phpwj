<?php
class Products
{
    private $conn;
    private $table_name = "products";

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

    public function showProduct() {
        $sql = "SELECT f.id, f.name, f.sku, f.price, f.description, f.qtd, c.name AS Category
        FROM ". $this->prod_table ." f
        INNER JOIN categories c
        ON c.id = 2
        WHERE c.id IN ( f.categories )";

        //ON c.id = f.categories
        // WHERE c.id IN (2,3)";

        $run = $this->conn->prepare($sql);
        $run->execute();    
        return $run;
    }

    public function addProduct() {

        $sql = "INSERT INTO ". $this->prod_table ." (name, sku, price, description, qtd, categories)
        VALUES ('".$name."','".$sku."','".$price."','".$desc."','".$qtd."', 1)";

        $run = $this->conn->prepare($sql);
        $run->execute();    
        return $run;

    }

    public function editProduct() {
        $sql = "UPDATE ". $this->prod_table ." SET name = '$name', code = '$code' WHERE id = $id";

        $run = $this->conn->prepare($sql);
        $run->execute();    
        return $run;
    }

    public function deleteProduct() {
        $sql = "DELETE FROM ". $this->prod_table ." WHERE id = $id";

        $run = $this->conn->prepare($sql);
        $run->execute();    
        return $run;
    }

}
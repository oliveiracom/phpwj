<?php

class Commerce {
    private $_params;
     
    public function __construct($params)
    {
        $this->_params = $params;
    }
    
    public function listCategories() {
        $sql = "SELECT * FROM categories"; 
    }
    
    public function listProducts() {
        $sql = "SELECT * FROM products";
    }

    public function showCategory() {
        $sql = "SELECT * FROM categories WHERE id = $id";
    }

    public function showProduct() {
        $sql = "SELECT f.id, f.name, f.sku, f.price, f.description, f.qtd, c.name AS Category
        FROM products f
        INNER JOIN categories c
        ON c.id = 2
        WHERE c.id IN (2,3)";

        //ON c.id = f.categories
        // WHERE c.id IN (2,3)";
    }
    
    public function addCategory() {
        $sql = "INSERT INTO categories (name, code) VALUES ('".$name."','".$code."')"; 

    $cat = new CategoryItem();
    $cat->name = $this->_params['name'];
    $cat->code = $this->_params['code'];

    return $cat->add();

    }

    public function addProduct() {
        $sql = "INSERT INTO products (name, sku, price, description, qtd, categories)
        VALUES ('".$name."','".$sku."','".$price."','".$desc."','".$qtd."', 1)"; 

        if (mysqli_query($connect, $sql)) {
            $id = $connect->insert_id;
            echo "Novo produto <strong>$name</strong> cadastrado com sucesso. ID do produto $id";
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }

    }

    public function editCategory() {
        $sql = "UPDATE products SET name = '$name', sku = '$sku', price = '$price', description = '$desc', qtd = '$qtd', categories = '$cats' WHERE id = $id";
    }

    public function editProduct() {
        $sql = "UPDATE categories SET name = '$name', code = '$code' WHERE id = $id";
    }

    
    
    public function deleteCategory() {
        $sql = "DELETE FROM categories WHERE id = $id";
    }
    
    public function deleteProduct() {
        $sql = "DELETE FROM products WHERE id = $id";
    }
}

?>
<?php
require('db_connect.php');

$name = $_POST['name'];
$sku = $_POST['sku'];
$price = $_POST['price'];
$desc = $_POST['desc'];
$qtd = $_POST['qtd'];
$cats = '';

$categories = $_POST['cats'];

foreach ($categories as $cat) {
    $cats .= $cat;
}

$sql = "INSERT INTO products (name, sku, price, description, qtd, categories)
    VALUES ('".$name."','".$sku."','".$price."','".$desc."','".$qtd."', 1)"; 

if (mysqli_query($connect, $sql)) {
    $id = $connect->insert_id;
    echo "Novo produto <strong>$name</strong> cadastrado com sucesso. ID do produto $id";
  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }
?>
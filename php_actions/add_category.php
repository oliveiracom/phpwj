<?php
require('db_connect.php');

$name = $_POST['name'];
$code = $_POST['code'];

$sql = "INSERT INTO categories (name, code) VALUES ('".$name."','".$code."')"; 

if (mysqli_query($connect, $sql)) {
    echo "Nova categoria <strong>$name</strong> criada com sucesso";
  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }
?>
<?php
require('db_connect.php');

$id = $_GET[id];
$sql = "SELECT f.id, f.name, f.sku, f.price, f.description, f.qtd, c.name AS Category
  FROM products f
  INNER JOIN categories c
  ON c.id = 2
  WHERE c.id IN (2,3)";

  //ON c.id = f.categories
  // WHERE c.id IN (2,3)";

$result = mysqli_query($connect, $sql);

if ($result) {
    $r = mysqli_fetch_assoc($result);

    echo json_encode($r);

  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }


?>
<?php
require('db_connect.php');

$id = 2; // change to post value

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

$sql = "UPDATE products SET name = '$name', sku = '$sku', price = '$price', description = '$desc', qtd = '$qtd', categories = '$cats' WHERE id = $id";

$result = mysqli_query($connect, $sql);

if ($result) {
    $r = mysqli_fetch_assoc($result);

    echo json_encode($r);

  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }


?>
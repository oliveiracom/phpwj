<?php
require('db_connect.php');

$id = 2; // change to post value

// $name = $_POST['name'];
$name = "Trekking";
//$code = $_POST['code'];
$code = 24;

$sql = "UPDATE categories SET name = '$name', code = '$code' WHERE id = $id";


if ( mysqli_query($connect, $sql) ) {
    echo "Categoria atualizada para <strong>$name</strong>, Código: $code";

  } else {
    echo "Error: " . $connect->error;
  }

?>
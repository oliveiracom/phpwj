<?php
require('db_connect.php');

$id = 1; // change to post value

$sql = "DELETE FROM categories WHERE id = $id";


if ( mysqli_query($connect, $sql) ) {
    echo "Categoria deletada.";

  } else {
    echo "Error: " . $connect->error;
  }

?>
<?php
require('db_connect.php');

$id = 1; // change to post value

$sql = "DELETE FROM products WHERE id = $id";

if ( mysqli_query($connect, $sql) ) {
    echo "Produto deletado.";

  } else {
    echo "Error: " . $connect->error;
  }

?>
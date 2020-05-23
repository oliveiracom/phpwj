<?php
require('db_connect.php');

$id = 2; // change to post value
$sql = "SELECT * FROM categories WHERE id = $id";

$result = mysqli_query($connect, $sql);

if ($result) {
    $r = mysqli_fetch_assoc($result);

    echo json_encode($r);

  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }


?>
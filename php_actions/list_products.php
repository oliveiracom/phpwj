<?php
require('db_connect.php');

$sql = "SELECT * FROM products"; 

$result = mysqli_query($connect, $sql);
$total = [];

if ($result) {
    while($r = mysqli_fetch_assoc($result)) {
        array_push($total, $r);
      }

      echo json_encode($total);

  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }

?>
<?php

$localhost = "127.0.0.1"; 
$username = "root"; 
$password = ""; 
$dbname = "webjump";

$connect = new mysqli($localhost, $username, $password, $dbname); 

if($connect->connect_error) {
    die("Erro de Conexão: " . $connect->connect_error);
} else {
    // silence is gold
}

?>

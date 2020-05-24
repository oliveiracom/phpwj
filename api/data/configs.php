<?php

    $localhost = "127.0.0.1"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "webjump";
    $try = "mysql:host=$localhost;dbname=$dbname;";

try { 
            $conn = new PDO($try, $username, $password);
            echo "Connected successfully";
            return $conn;
          } catch (PDOException $error) {
            echo 'Connection error: ' . $error->getMessage();
          }
        
?>

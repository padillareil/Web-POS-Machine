<?php
    $Hostname   = ''; 
    $servername = "127.0.0.1";
    $database = "pos";
    $username = "root";
    $password = "";

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }

?> 
<?php
    $Hostname   = ''; 
    $servername = "127.0.0.1";
    $database = "pos";
    $username = "root";
    $password = "";

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){

        if (defined('DEBUG') && DEBUG) {
            echo "Connection failed: " . $e->getMessage();
        } 
        else if (!headers_sent()) {
            header("Location: ../404.php");
            exit();
        }
    }
<?php
require_once "../config/connection.php";
require_once "../config/functions.php";
session_start();
$User = sanitize($_SESSION['RowNum']);
session_destroy();
echo "OK";
?>


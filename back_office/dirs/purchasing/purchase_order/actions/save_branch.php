<?php
require_once "../../../../../config/connection.php";
session_start();

$BranchCode = strtoupper($_POST['BranchCode']);
$BranchName = strtoupper($_POST['BranchName']);
$Location 	= $_POST['Location'];
$ContactPerson 	= $_POST['ContactPerson'];
$ContactNumber = $_POST['ContactNumber'];
$Email = $_POST['Email'];
$BranchSize = $_POST['BranchSize'];
$BusinessSpace = $_POST['BusinessSpace'];

try{

    $conn->beginTransaction();

    $ins_branch  = $conn->prepare("CALL Add_New_Branch(?,?,?,?,?,?,?,?)");
    $ins_branch->execute([
        $BranchCode,
        $BranchName,
        $Location,
        $ContactPerson,
        $ContactNumber,
        $Email,
        $BranchSize,
        $BusinessSpace
    ]);

    $conn->commit();
    echo "OK";

}catch(PDOException $e){

    $conn->rollback();
    echo "<b>Warning. Please Contact System Developer.<br/></b>".$e->getMessage();

}
?>
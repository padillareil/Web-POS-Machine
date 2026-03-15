<?php
require_once "../../../../../config/connection.php";
session_start();

$VendorCode 	= $_POST['VendorCode'];
$VendorName 	= $_POST['VendorName'];
$ContactPerson 	= $_POST['ContactPerson'];
$ContactNumber 	= $_POST['ContactNumber'];
$Email 	        = $_POST['Email'];
$Website        = $_POST['Website'];
$BillingAddress = $_POST['BillingAddress'];
$Shipping       = $_POST['Shipping'];
$PaymentTerms   = $_POST['PaymentTerms'];
$Bank           = $_POST['Bank'];
$AccountName    = $_POST['AccountName'];
$AccountNumber  = $_POST['AccountNumber'];
$Status         = $_POST['Status'];
$Remarks        = $_POST['Remarks'];

try{

    $conn->beginTransaction();

    $ins_vendor = $conn->prepare("CALL Add_New_Vendor(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $ins_vendor->execute([
        $VendorCode,
        $VendorName,
        $ContactPerson,
        $ContactNumber,
        $Email,
        $Website,
        $BillingAddress,
        $Shipping,
        $PaymentTerms,
        $Bank,
        $AccountName,
        $AccountNumber,
        $Status,
        $Remarks
    ]);

    $conn->commit();
    echo "OK";

}catch(PDOException $e){

    $conn->rollback();
    echo "<b>Warning. Please Contact System Developer.<br/></b>".$e->getMessage();

}
?>
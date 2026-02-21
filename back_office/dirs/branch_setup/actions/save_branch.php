<?php
	require_once "../../../../config/connection.php";

	$Branch 	=	$_POST['Branch'];
	$Bcode 		=	$_POST['Bcode'];
	$BType 		=	$_POST['BType'];
	$Status 	=	$_POST['Status'];
	$Category 	=	$_POST['Category'];
	$Lease 		=	$_POST['Lease'];
	$Address 	=	$_POST['Address'];
	$Municipality 	=	$_POST['Municipality'];
	$Province 	=	$_POST['Province'];
	$ZipCode 	=	$_POST['ZipCode'];
	$Country 	=	$_POST['Country'];
	$Phone 		=	$_POST['Phone'] ?? '';
	$Email 		=	$_POST['Email'] ?? '';
	$Manager 	=	$_POST['Manager'] ?? '';
	$ManagerContact 	=	$_POST['ManagerContact'] ?? '';
	$Opening 	=	$_POST['Opening'];
	$Closing 	=	$_POST['Closing'];
	$Tin 		=	$_POST['Tin'] ?? '';
	$Permit 	=	$_POST['Permit'] ?? '';

	try{

		$conn->beginTransaction();

		$ins_branch = $conn->prepare("CALL ADD_BRANCH (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$ins_branch->execute([$Branch,$Bcode, $BType, $Address,$Municipality,$Province,$ZipCode,$Country, $Phone, $Email, $Manager, $ManagerContact, $Opening, $Closing, $Tin, $Permit, $Category, $Lease]);
		
		$conn->commit();
		echo "OK";

	}catch(PDOException $e){
		$conn->rollback();
		echo "<b>Warning. Please Contact System Developer.<br/></b>".$e;getMessage();
	}


?>



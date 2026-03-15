<?php
require_once "../../../../../config/connection.php";
session_start();
$User = $_SESSION['RowNum'];

try {
    $conn->beginTransaction();
    $fetch_vendors = $conn->prepare("CALL Vendor_Selection");
    $fetch_vendors->execute();
    $get_vendorname = $fetch_vendors->fetchAll(PDO::FETCH_ASSOC);
    $fetch_vendors->closeCursor();

    $conn->commit();

    $response = array(
        "isSuccess" => "success",
        "Data" => $get_vendorname
    );

    echo json_encode($response);

} catch (PDOException $e) {

    if ($conn->inTransaction()) {
        $conn->rollBack();
    }

    $response = array(
        "isSuccess" => "Failed",
        "Data" => "<b>Error. Please Contact System Developer.<br/></b>" . $e->getMessage()
    );

    echo json_encode($response);
}
?>
<?php
require_once "../../../../../config/connection.php";
session_start();

$User = $_SESSION['RowNum'];

try {

    $conn->beginTransaction();

    $fetch_vendorcode = $conn->prepare("CALL Auto_Vendor_Code");
    $fetch_vendorcode->execute();

    $get_vendorcode = $fetch_vendorcode->fetchAll(PDO::FETCH_ASSOC);

    // VERY IMPORTANT
    $fetch_vendorcode->closeCursor();

    $conn->commit();

    $response = array(
        "isSuccess" => "success",
        "Data" => $get_vendorcode
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
<?php
require_once "../../../../../config/connection.php";
session_start();

$User = $_SESSION['RowNum'];

try {

    $conn->beginTransaction();

    $fetch_ponumber = $conn->prepare("CALL Auto_PurchaseOrder_Num");
    $fetch_ponumber->execute();

    $get_ponumber = $fetch_ponumber->fetchAll(PDO::FETCH_ASSOC);

    // VERY IMPORTANT
    $fetch_ponumber->closeCursor();

    $conn->commit();

    $response = array(
        "isSuccess" => "success",
        "Data" => $get_ponumber
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
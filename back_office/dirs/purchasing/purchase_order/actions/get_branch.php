<?php
require_once "../../../../../config/connection.php";
session_start();
$User = $_SESSION['RowNum'];

try {
    $conn->beginTransaction();
    $fetch_branch = $conn->prepare("CALL Branch_Selection");
    $fetch_branch->execute();
    $get_branch = $fetch_branch->fetchAll(PDO::FETCH_ASSOC);
    $fetch_branch->closeCursor();

    $conn->commit();

    $response = array(
        "isSuccess" => "success",
        "Data" => $get_branch
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
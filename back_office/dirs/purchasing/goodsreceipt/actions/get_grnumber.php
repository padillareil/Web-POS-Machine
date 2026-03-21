<?php
require_once "../../../../../config/connection.php";
session_start();
$User = $_SESSION['RowNum'];

try {
    $conn->beginTransaction();
    $fetch_grnumber = $conn->prepare("CALL generate_gr_number (?)");
    $fetch_grnumber->execute([$User]);
    $get_grNum = $fetch_grnumber->fetch(PDO::FETCH_ASSOC);
    $fetch_grnumber->closeCursor();

    $conn->commit();

    $response = array(
        "isSuccess" => "success",
        "Data" => $get_grNum
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
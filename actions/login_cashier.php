<?php
if (!(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
      strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')) {
    header("Location: ../portal.php");
    exit;
}

session_start();
require_once '../config/connection.php';
require_once '../config/functions.php';

$Username = $_POST['Username'];
$Password = $_POST['Password'];

try {
    // Prepare CALL statement for MySQL stored procedure
    $stmt = $conn->prepare("CALL LOGIN(?)");
    $stmt->bindParam(1, $Username, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the user
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && verify_password($Password, $user['UserPassword'])) {
        $_SESSION['RowNum'] = $user['RowNum'];
        $_SESSION['Role']   = $user['Role'];

        echo json_encode([
            "response" => "OK",
            "role" => $user['Role']
        ]);
    } else {
        echo json_encode([
            "response" => "ERROR",
            "message" => "Invalid username or password"
        ]);
    }

    // Close cursor to avoid "Commands out of sync" error in MySQL
    $stmt->closeCursor();

} catch (PDOException $e) {
    echo json_encode([
        "response" => "ERROR",
        "message" => "Database error: " . $e->getMessage()
    ]);
}
?>

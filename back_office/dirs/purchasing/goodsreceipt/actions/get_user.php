<?php
  require_once "../../../../../config/connection.php";
  session_start();

  $User     = $_SESSION['RowNum'];

try {
  $conn->beginTransaction();

    $fetch_user = $conn->prepare("
      SELECT Fullname
      FROM UserAccount 
      WHERE RowNum = ?
    ");
    $fetch_user->execute([ $User ]);
    $get_user = $fetch_user->fetch(PDO::FETCH_ASSOC);

  $conn->commit();

  $response = array(
    "isSuccess" => 'success',
    "Data" => $get_user
  );
  echo json_encode($response);

}catch (PDOException $e){
  $conn->rollback();
  $response = array(
    "isSuccess" => 'Failed',
    "Data" => "<b>Error. Please Contact System Developer. <br/></b>".$e->getMessage()
  );
  echo json_encode($response);
}
?>
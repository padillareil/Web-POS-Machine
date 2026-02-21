<?php
require_once "../config/connection.php";
require_once "../config/functions.php";
session_start();


if (!isset($_SESSION['RowNum'])) {
    header('Location: ../portal.php');
    exit();
}

if (!isset($_SESSION['RowNum'])) {
    header("Location: ../404.php");
    exit();
}

$User = $_SESSION['RowNum'];

try {
    $ua = $conn->prepare("CALL SESSION_ACCOUNT (?)");
    $ua->execute([$User]);
    $user = $ua->fetch(PDO::FETCH_ASSOC);


} catch (PDOException $e) {
    echo "<b>Database Error:</b> " . htmlspecialchars($e->getMessage());
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>POS-Transaction</title>
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <link rel="stylesheet" href="../assets/css/style-pos.css">
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/plugins/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/css/datatables.min.css">
  <link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="../assets/plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-lite.min.css">
  <link rel="stylesheet" href="../assets/plugins/datepicker/jquery-ui.structure.min.css">
  <link rel="stylesheet" href="../node_modules/uikit/dist/css/uikit.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="icon" href="../assets/image/logo/favicon.png">

</head>
<body>
  <div class="container col-md-10  my-5">

    <!-- JUMBOTRON STYLE CONTAINER -->
    <div class="position-relative p-4 text-muted bg-body border border-dashed rounded-5 shadow-sm">
      <nav class="navbar navbar-expand bg-light rounded-3 mb-3">
        <div class="container-fluid">
          <ul class="navbar-nav align-items-center">
            <li class="nav-item">
              <a class="nav-link" href="#" id="sidebarToggle">
                <i class="fas fa-bars"></i>
              </a>
            </li>
            <li class="nav-item ms-2 d-flex align-items-center">
              <i class="bi bi-clock me-1"></i>
              <strong>
                <span id="clock"></span>
                <input type="hidden" id="clockvalue">
              </strong>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto align-items-center">
            <li class="nav-item me-3">
              <label for="cashier-name" class="form-label fw-semibold small mb-0 text-end">Terminal ID</label>
              <input type="text" name="terminal-id" id="terminal-id" value="031292" class="form-control form-control-plaintext bg-white" disabled style="width: 180px;">
            </li>
            <!-- Cashier Name -->
            <li class="nav-item me-3">
              <label for="cashier-name" class="form-label fw-semibold small mb-0 text-end">Cashier</label>
              <input type="text" name="cashier-name" id="cashier-name" value="Reil P. Padilla" class="form-control form-control-plaintext bg-white" disabled style="width: 180px;">
            </li>

            <!-- Cashier ID -->
            <li class="nav-item">
              <label for="cashier-id" class="form-label fw-semibold small mb-0 text-end">Cashier ID</label>
              <input type="text" name="cashier-id" id="cashier-id" value="0001023" class="form-control form-control-plaintext text-center bg-white" disabled style="width: 100px;">
            </li>

          </ul>


        </div>
      </nav>

      <div class="container-fluid" style="height: 75vh;">
        <div class="row g-3">
          <!-- SIDEBAR -->
          <div class="col-lg-3 col-xl-2"  id="sidebarCol">
            <div class="card shadow-sm sidebar-pos">
              <div class="card-body text-center border-bottom">
                <a href="index.php" style="text-decoration:none;">
                  <img src="../assets/image/logo/favicon.png" id="profile-image" style="width:80px;height:80px;object-fit:cover;">
                </a>
                <div class="fw-semibold mt-2">
                  <p class="mb-0">POS 1</p>
                </div>
              </div>

              <!-- Menu -->
              <div class="card-body p-2">
                <div class="small text-muted px-2 mb-2">Menu</div>
                <nav class="nav nav-pills flex-column gap-1" id="main-menu">
                  <a href="#" class="nav-link active" name="menu" menucode="transaction" data-bs-toggle="tooltip" data-bs-title="Process sales">
                    <i class="bi bi-pc-display-horizontal me-2"></i>
                    Sales
                  </a>
                  <a href="#" class="nav-link" name="menu" menucode="refund" data-bs-toggle="tooltip" data-bs-title="Process refund">
                    <i class="bi bi-arrow-return-left me-2"></i>
                    Refunds
                  </a>
                  <a href="#" class="nav-link" name="menu" data-bs-toggle="tooltip" data-bs-title="Search Item" onclick="mdlFindItem()">
                    <i class="bi bi-search me-2"></i>
                    Item Lookup
                  </a>
                  <a href="#" class="nav-link" name="menu" menucode="report" data-bs-toggle="tooltip" data-bs-title="End Shift Report">
                    <i class="bi bi-receipt me-2"></i>
                    Report
                  </a>
                  <hr class="my-2">
                  <a href="#" class="nav-link" name="menu" menucode="settings" data-bs-toggle="tooltip" data-bs-title="Settings">
                    <i class="bi bi-gear me-2"></i>
                    Settings
                  </a>
                  <a href="#" class="nav-link text-danger mb-2" onclick="logout()">
                    <i class="bi bi-box-arrow-right me-2"></i>
                    Logout
                  </a>
                </nav>
              </div>
            </div>
          </div>
          <!-- CONTENT AREA -->
          <div class="col-lg-9 col-xl-10">
            <div class="mb-3">
              <h4 class="fw-bold m-0" id="main-title"></h4>
            </div>
            <div class="card shadow-sm">
              <div class="card-body">
                <div id="main-content"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- FOOTER -->
      <footer class="text-center mt-4 text-muted small">
        Developed by: Reil P. Padilla —
        <span id="current-year"></span>
      </footer>
    </div>
  </div>



<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/plugins/toastr/toastr.min.js"></script>
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../assets/plugins/datatables/datatables.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../assets/plugins/summernote/summernote-lite.min.js"></script>
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../assets/plugins/elevatezoom-plus-master/src/jquery.ez-plus.js"></script>
<script src="../assets/js/adminlte.js"></script>
<script src="../assets/js/global-scripts.js"></script>
<script src="../assets/js/datatables.min.js"></script>
<script src="../assets/plugins/datepicker/jquery-ui.min.js"></script>
<script src="../node_modules/uikit/dist/js/uikit.min.js"></script>
<script src="../node_modules/xlsx/dist/xlsx.full.min.js"></script>
<script src="script/script.js"></script>
<?php include '../modal.php';?>
</body>
</html>




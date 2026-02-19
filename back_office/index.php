<?php
require_once "../config/connection.php";
require_once "../config/functions.php";
session_start();


if (!isset($_SESSION['RowNum'])) {
    header('Location: ../portal.php');
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
  <title>Back Office</title>
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
  <div class="container col-md-11  my-5">

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

                  <a href="#" class="nav-link d-none active" name="menu" menucode="dashboard"> <!-- Dashaboard for default landing page -->
                  </a>
                  
                  <!-- Product Master -->
                  <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#productMasterMenu" role="button" aria-expanded="false" aria-controls="productMasterMenu">
                      <span>
                          <i class="bi bi-box-seam me-2"></i>
                          Product Master
                      </span>
                      <i class="bi bi-chevron-down small"></i>
                  </a>
                  <div class="collapse" id="productMasterMenu">
                      <ul class="nav flex-column ms-4">
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="item_registration">
                                  Item Registration
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="category_setup">
                                  Category Setup
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="price_levels">
                                  Price Levels
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="product_combo">
                                  Product Combo
                              </a>
                          </li>
                      </ul>
                  </div>

                  <!-- Inventoty Master -->
                  <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#inventoryMasterMenu" role="button" aria-expanded="false" aria-controls="inventoryMasterMenu">
                      <span>
                          <i class="bi bi-box-seam me-2"></i>
                          Inventory Master
                      </span>
                      <i class="bi bi-chevron-down small"></i>
                  </a>
                  <div class="collapse" id="inventoryMasterMenu">
                      <ul class="nav flex-column ms-4">
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="stocks_adjustment">
                                  Stocks Adjustment
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="costing">
                                  Costing
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="inv_ledger">
                                  Inventory Ledger
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="stk_monitoring">
                                  Stocks Monitoring
                              </a>
                          </li>
                      </ul>
                  </div>

                  <!-- Purchasing Master -->
                  <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#purchasingMasterMenu" role="button" aria-expanded="false" aria-controls="purchasingMasterMenu">
                      <span>
                          <i class="bi bi-card-checklist me-2"></i>
                          Purchasing
                      </span>
                      <i class="bi bi-chevron-down small"></i>
                  </a>
                  <div class="collapse" id="purchasingMasterMenu">
                      <ul class="nav flex-column ms-4">
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="purchase_request">
                                  Purchase Request
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="purchase_order">
                                  Purchase Order
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="goods-receipt">
                                Goods Receipt
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="supplies_return">
                                  Supplies Return
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="ap_monitoring">
                                  AP Monitoring
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="vendor">
                                  Vendor
                              </a>
                          </li>
                      </ul>
                  </div>

                  <!-- Purchasing Master -->
                  <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#saleManagementControl" role="button" aria-expanded="false" aria-controls="saleManagementControl">
                      <span>
                          <i class="bi bi-graph-up-arrow me-2"></i>
                          Sales Management
                      </span>
                      <i class="bi bi-chevron-down small"></i>
                  </a>
                  <div class="collapse" id="saleManagementControl">
                      <ul class="nav flex-column ms-4">
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="sales_monitoring">
                                  Sales Monitoring
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="sales_return">
                                  Sales Return
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="discount_promo">
                                Discount & Promo Setup
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="credit_sales">
                                  Credit Sales Control
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="price_overide">
                                  Price Override Control
                              </a>
                          </li>
                      </ul>
                  </div>

                  <!-- Cash & Shift Managment -->
                  <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#cashShiftManagment" role="button" aria-expanded="false" aria-controls="cashShiftManagment">
                      <span>
                          <i class="bi bi-people me-2"></i>
                          Cash & Shift Management
                      </span>
                      <i class="bi bi-chevron-down small"></i>
                  </a>
                  <div class="collapse" id="cashShiftManagment">
                      <ul class="nav flex-column ms-4">
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="cash_in_out">
                                  Cash In /Cash Out
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="shift_assignment">
                                  Shift Assignment
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="x_reading">
                                X-Reading
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="z_reading">
                                  Z-Reading
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="cash_variance_report">
                                  Cash Variance Report
                              </a>
                          </li>
                      </ul>
                  </div>

                  <!-- Financiall COntrol -->
                  <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#finnclControl" role="button" aria-expanded="false" aria-controls="finnclControl">
                      <span>
                          <i class="bi bi-cash-stack me-2"></i>
                          Financial Control
                      </span>
                      <i class="bi bi-chevron-down small"></i>
                  </a>
                  <div class="collapse" id="finnclControl">
                      <ul class="nav flex-column ms-4">
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="ar_monitoring">
                                  AR Monitoring
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="ap_monitoring">
                                  AP Monitoring
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="tax_setup">
                                Tax Setup (VAT/ Non-VAT)
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="pay_method_setup">
                                  Payment Method Setup
                              </a>
                          </li>
                      </ul>
                  </div>

                  <!-- Financiall COntrol -->
                  <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#repAnalytics" role="button" aria-expanded="false" aria-controls="repAnalytics">
                      <span>
                          <i class="bi bi-bar-chart me-2"></i>
                          Report & Analytics
                      </span>
                      <i class="bi bi-chevron-down small"></i>
                  </a>
                  <div class="collapse" id="repAnalytics">
                      <ul class="nav flex-column ms-4">
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="sales_summary">
                                  Sales Summary
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="inv_valuation">
                                  Inventory Valuation
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="gross_profit">
                                Gross Profit Report
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="top_selling_items">
                                  Top Selling Items
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="staff_performance">
                                  Staff Performance
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="aging_reports">
                                  Aging Reports (AR/AP)
                              </a>
                          </li>
                      </ul>
                  </div>

                  <!-- Financiall COntrol -->
                  <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#securityControl" role="button" aria-expanded="false" aria-controls="securityControl">
                      <span>
                          <i class="bi bi-menu-button me-2"></i>
                          Security & System Control
                      </span>
                      <i class="bi bi-chevron-down small"></i>
                  </a>
                  <div class="collapse" id="securityControl">
                      <ul class="nav flex-column ms-4">
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="user_permission_control">
                                  User Roles & Permission
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="audit_trail">
                                  Audit Trail
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="gross_profit">
                                Gross Profit Report
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="branch_setup">
                                  Branch Setup
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="terminal_setup">
                                 Terminal Setup
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link" name="menu" menucode="system_parameters">
                                  System Parameters
                              </a>
                          </li>
                      </ul>
                  </div>
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





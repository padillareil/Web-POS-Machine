<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Point of Sale</title>
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/sweetalert2/sweetalert2.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="icon" href="assets/image/logo/favicon.png">
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark mb-4 py-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">POS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Register</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container" style="margin-top: 20vh;">
    <div class="row justify-content-center">
      <div class="col-md-4 mb-3">
        <div class="card h-100 shadow rounded-4 text-center border-0 bg-danger-subtle" onclick="loginAdmin()">
          <div class="card-body p-5">
            <div class="mb-3">
              <i class="bi bi-shield-lock-fill fs-1 text-danger"></i>
            </div>
            <h4 class="fw-bold">Admin</h4>
            <p class="text-muted small mt-2">
              Full system control, user management, configuration, and reports.
            </p>
            <span class="badge bg-danger mt-2">Full Access</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card h-100 shadow rounded-4 text-center border-0 bg-primary-subtle" onclick="loginCashier()">
          <div class="card-body p-5">
            <div class="mb-3">
              <i class="bi bi-receipt-cutoff fs-1 text-primary"></i>
            </div>
            <h4 class="fw-bold">Cashier</h4>
            <p class="text-muted small mt-2">
              Process sales, handle payments, print receipts, and POS operations.
            </p>
            <span class="badge bg-primary mt-2">POS Access</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card h-100 shadow rounded-4 text-center border-0 bg-success-subtle" onclick="lognBackOffice()">
          <div class="card-body p-5">
            <div class="mb-3">
            <i class="bi bi-building-gear fs-1 text-success"></i>
          </div>
            <h4 class="fw-bold">Admin Office</h4>
             <p class="text-muted small mt-2">
            Manage inventory, suppliers, purchasing, and documentation.
          </p>
            <span class="badge bg-success mt-2">Back Office</span>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <script src="assets/plugins/bootstrap/scripts/jquery.min.js"></script>
  <script src="assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="assets/js/adminlte.js"></script>
  <script src="assets/js/global-scripts.js"></script>
  <script src="assets/js/login.js"></script>
</body>
</html>

  


<?php include 'modal.php';  ?>
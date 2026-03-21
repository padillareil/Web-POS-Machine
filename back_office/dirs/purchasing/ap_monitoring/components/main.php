<div class="card shadow-sm bg-secondary">

    <!-- HEADER -->
    <div class="card-header d-flex align-items-center bg-dark-subtle flex-wrap gap-2">

        <!-- TITLE -->
        <h5 class="mb-0 text-dark">Accounts Payable Monitoring</h5>

        <!-- FILTERS -->
        <div class="ms-auto d-flex align-items-center gap-2 flex-wrap">

            <!-- DATE -->
            <input type="date" class="form-control form-control-sm" style="width: 140px;">
            <span class="text-dark small">to</span>
            <input type="date" class="form-control form-control-sm" style="width: 140px;">

            <!-- BRANCH -->
            <select class="form-select form-select-sm" style="width: 160px;">
                <option value="">Branch</option>
            </select>

            <!-- VENDOR -->
            <select class="form-select form-select-sm" style="width: 160px;">
                <option value="">Vendor</option>
            </select>

            <!-- STATUS -->
            <select class="form-select form-select-sm" style="width: 130px;">
                <option value="">All Status</option>
                <option value="OPEN">Open</option>
                <option value="OVERDUE">Overdue</option>
                <option value="PAID">Paid</option>
            </select>

            <!-- APPLY BUTTON -->
            <button class="btn btn-primary btn-sm">
                <i class="bi bi-search"></i> Search
            </button>

            <!-- REFRESH -->
            <button class="btn btn-dark btn-sm">
                <i class="bi bi-arrow-clockwise"></i> Refresh
            </button>

            <!-- TOOLS DROPDOWN -->
            <div class="btn-group">
                <button type="button" class="btn bg-purple btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-gear"></i> Menus
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-text"></i> Aging Report</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-person-lines-fill"></i> Vendor Ledger</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-cash-stack"></i> Payment History</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-download"></i> Export Excel</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i> Print</a></li>
                </ul>
            </div>

        </div>
    </div>

    <!-- BODY -->
    <div class="card-body">

        <!-- KPI SECTION -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <a href="#" class="text-decoration-none">
              <div class="card shadow-sm border-0 rounded-4 hover-lift">
                <div class="card-body d-flex align-items-center">
                  <div class="me-3 rounded-circle bg-info-subtle text-info d-flex align-items-center justify-content-center" style="width:56px;height:56px;">
                    <i class="fas fa-file-invoice-dollar fs-4"></i>
                  </div>
                  <div>
                    <div class="text-muted">Total Payables</div>
                    <div class="fs-3 fw-bold text-danger"> <h4>₱ 0.00</h4>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <a href="#" class="text-decoration-none">
              <div class="card shadow-sm border-0 rounded-4 hover-lift">
                <div class="card-body d-flex align-items-center">
                  <div class="me-3 rounded-circle bg-warning-subtle text-warning d-flex align-items-center justify-content-center" style="width:56px;height:56px;">
                    <i class="fas fa-clock fs-4"></i>
                  </div>
                  <div>
                    <div class="text-muted">Due Soon</div>
                    <div class="fs-3 fw-bold text-danger"> <h4>₱ 0.00</h4>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <a href="#" class="text-decoration-none">
              <div class="card shadow-sm border-0 rounded-4 hover-lift">
                <div class="card-body d-flex align-items-center">
                  <div class="me-3 rounded-circle bg-danger-subtle text-danger d-flex align-items-center justify-content-center" style="width:56px;height:56px;">
                    <i class="fas fa-exclamation-triangle fs-4"></i>
                  </div>
                  <div>
                    <div class="text-muted">Overdue</div>
                    <div class="fs-3 fw-bold text-danger"> <h4>₱ 0.00</h4>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <a href="#" class="text-decoration-none">
              <div class="card shadow-sm border-0 rounded-4 hover-lift">
                <div class="card-body d-flex align-items-center">
                  <div class="me-3 rounded-circle bg-success-subtle text-success d-flex align-items-center justify-content-center" style="width:56px;height:56px;">
                    <i class="fas fa-check-circle fs-4"></i>
                  </div>
                  <div>
                    <div class="text-muted">Paid</div>
                    <div class="fs-3 fw-bold text-success"> <h4>₱ 0.00</h4>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

        </div>

     <!-- TABLE -->
     <div class="table-responsive" style="height: 60vh;">
         <table class="table table-sm table-hover table-bordered align-middle">
             <thead class="table-light">
                 <tr>
                     <th>Doc No</th>
                     <th>Vendor</th>
                     <th>Doc Date</th>
                     <th>Due Date</th>
                     <th class="text-end">Amount</th>
                     <th class="text-end">Paid</th>
                     <th class="text-end">Balance</th>
                     <th>Status</th>
                     <th>Days</th>
                     <th class="text-center">Action</th>
                 </tr>
             </thead>
             <tbody id="ap-table">

                 <!-- OPEN -->
                 <tr>
                     <td>AP-0001</td>
                     <td>ABC Supplier</td>
                     <td>2026-03-01</td>
                     <td>2026-03-25</td>
                     <td class="text-end">15,000.00</td>
                     <td class="text-end">0.00</td>
                     <td class="text-end">15,000.00</td>
                     <td><span class="badge bg-primary">Open</span></td>
                     <td>0</td>
                     <td class="text-center">
                         <button class="btn btn-outline-info btn-sm">View</button>
                         <button class="btn btn-outline-success btn-sm">Pay</button>
                     </td>
                 </tr>

                 <!-- DUE SOON -->
                 <tr>
                     <td>AP-0002</td>
                     <td>XYZ Traders</td>
                     <td>2026-03-05</td>
                     <td>2026-03-22</td>
                     <td class="text-end">8,500.00</td>
                     <td class="text-end">2,000.00</td>
                     <td class="text-end">6,500.00</td>
                     <td><span class="badge bg-warning text-dark">Due Soon</span></td>
                     <td>3</td>
                     <td class="text-center">
                         <button class="btn btn-outline-info btn-sm">View</button>
                         <button class="btn btn-outline-success btn-sm">Pay</button>
                     </td>
                 </tr>

                 <!-- OVERDUE -->
                 <tr>
                     <td>AP-0003</td>
                     <td>LMN Supplies</td>
                     <td>2026-02-15</td>
                     <td>2026-03-01</td>
                     <td class="text-end">12,000.00</td>
                     <td class="text-end">7,000.00</td>
                     <td class="text-end">5,000.00</td>
                     <td><span class="badge bg-danger">Overdue</span></td>
                     <td>21</td>
                     <td class="text-center">
                         <button class="btn btn-outline-info btn-sm">View</button>
                         <button class="btn btn-outline-success btn-sm">Pay</button>
                     </td>
                 </tr>

                 <!-- PAID -->
                 <tr>
                     <td>AP-0004</td>
                     <td>OPQ Enterprises</td>
                     <td>2026-02-20</td>
                     <td>2026-03-10</td>
                     <td class="text-end">5,000.00</td>
                     <td class="text-end">5,000.00</td>
                     <td class="text-end">0.00</td>
                     <td><span class="badge bg-success">Paid</span></td>
                     <td>0</td>
                     <td class="text-center">
                         <button class="btn btn-outline-info btn-sm">View</button>
                         <button class="btn btn-outline-secondary btn-sm" disabled>Pay</button>
                     </td>
                 </tr>

             </tbody>
         </table>
     </div>
    </div>

</div>
<form id="frm-find-item" class="mb-3">
  <div class="row g-3 align-items-end">
    <div class="col-md-6">
      <label for="search-item" class="form-label fw-semibold small">Barcode / Item (F3)</label>
      <input type="search" name="search-item" id="search-item"  class="form-control border-primary" placeholder="********************************************" autocomplete="off">
    </div>
   <div class="col-md-2">
   </div>
    <div class="col-md-2">
      <label for="customername" class="form-label fw-semibold small">Customer</label>
      <input type="text" name="customername" id="customername"  class="form-control border-primary" placeholder="Customer Name">
    </div>
    <div class="col-md-2">
      <label for="current-date" class="form-label fw-semibold small">Date</label>
      <input type="date" name="current-date" id="current-date" class="form-control form-control-plaintext bg-white" disabled value="<?= date('Y-m-d') ?>">
    </div>
  </div>
</form>


<!-- Product/ item Display -->
<div class="row mt-2">

  <!-- Ordered Products Table -->
  <div class="col-md-8">
    <div class="card shadow-sm overscroll-auto" style="height: 60vh;">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped align-middle">
            <thead class="table-light">
              <tr>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>QTY</th>
                <th>VAT</th>
                <th>TOTAL</th>
              </tr>
            </thead>
            <tbody id="order-items">

              <tr>
                <td colspan="5" class="text-center py-5">
                  <div class="d-flex flex-column align-items-center text-muted">
                    <div class="mb-3" style="font-size: 40px;">
                      <i class="fa fa-barcode"></i>
                    </div>
                    <div class="fw-semibold">No items yet</div>
                    <div class="small opacity-75">
                      Scan barcode or search item to begin
                    </div>
                  </div>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
        <small id="total-items">Total Items: 0</small>
        <br>
        <strong id="grand-total">Grand Total: 0.00</strong>
      </div>
    </div>
  </div>

  <!-- Product Description & Action Buttons -->
  <div class="col-md-4">
    <div class="card shadow-sm d-flex flex-column" style="height: 60vh;">

      <!-- BODY -->
      <div class="card-body overscroll-auto flex-grow-1">

        <!-- Item Summary -->
        <div class="mb-3">
          <h6 class="fw-semibold">Item Summary</h6>
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
              <span>Subtotal</span>
              <span id="subtotal">0.00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>VAT</span>
              <span id="vat">0.00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between fw-bold fs-5">
              <span>Total</span>
              <span id="total">0.00</span>
            </li>
          </ul>
        </div>

      </div>

      <!-- FOOTER ACTION GRID -->
      <div class="card-footer bg-light">
        <div class="row g-2">
          <div class="col-4">
            <button class="btn btn-success w-100 py-3" title="Next Transaction">
              <i class="bi bi-receipt fa-lg mb-1"></i><br>
              Tender
              <div class="small opacity-75">F4</div>
            </button>
          </div>
          <div class="col-4">
            <button class="btn btn-info w-100 py-3" title="Re-print receipt">
              <i class="bi bi-printer fa-lg mb-1"></i><br>
              Reprint
              <div class="small opacity-75">F6</div>
            </button>
          </div>
          <div class="col-4">
            <button class="btn btn-danger w-100 py-3" title="Clear Transaction">
              <i class="bi bi-trash fa-lg mb-1"></i><br>
              Clear
              <div class="small opacity-75">F8</div>
            </button>
          </div>
          <div class="col-4">
            <button class="btn bg-gradient-orange w-100 py-3"  title="Suspend Transaction">
              <i class="fa fa-pause fa-lg mb-1"></i><br>
              Suspend
              <div class="small opacity-75">F9</div>
            </button>
          </div>
          <div class="col-4">
            <button class="btn bg-gradient-purple w-100 py-3"  title="Suspend Transaction">
              <i class="bi bi-stopwatch fa-lg mb-1"></i><br>
              Break
              <div class="small opacity-75">F10</div>
            </button>
          </div>
          <div class="col-4">
            <button class="btn bg-gradient-secondary w-100 py-3"  title="Suspend Transaction">
              <i class="bi bi-building-fill-gear fa-lg mb-1"></i><br>
              Back Office
              <div class="small opacity-75">F1</div>
            </button>
          </div>
        </div>

      </div>

    </div>
  </div>


</div>

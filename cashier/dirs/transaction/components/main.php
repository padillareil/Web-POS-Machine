<form id="frm-find-item" class="mb-3">
  <div class="row g-3 align-items-end">
    <div class="col-md-6">
      <label for="search-item" class="form-label fw-semibold small">Barcode / Item Name</label>
      <input type="search" name="search-item" id="search-item"  class="form-control border-primary" placeholder="**********************" autocomplete="off">
    </div>
   <div class="col-md-2"></div>
    <div class="col-md-2">
      <label for="customername" class="form-label fw-semibold small">Customer</label>
      <input type="text" name="customername" id="customername"  class="form-control border-primary" placeholder="Customer Name">
    </div>
    <div class="col-md-2">
      <label for="current-date" class="form-label fw-semibold small">Date</label>
      <input type="date" name="current-date" id="current-date" class="form-control" disabled value="<?= date('Y-m-d') ?>">
    </div>
  </div>
</form>


<!-- Product/ item Display -->
<div class="row mt-2">

  <!-- Ordered Products Table -->
  <div class="col-md-8">
    <div class="card shadow-sm">
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
              <!-- Dynamically populated rows -->
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
    <div class="card shadow-sm">
      <div class="card-body">
        <!-- Item Info / Summary -->
        <div class="mb-3">
          <h6 class="fw-semibold">Item Summary</h6>
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
              <span>Subtotal:</span>
              <span id="subtotal">0.00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>VAT:</span>
              <span id="vat">0.00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between fw-bold">
              <span>Total:</span>
              <span id="total">0.00</span>
            </li>
          </ul>
        </div>

        <!-- Action Buttons -->
        <div class="d-grid gap-2">
          <button type="button" class="btn btn-primary btn-lg">Tender Payment</button>
          <button type="button" class="btn btn-secondary btn-lg">Reprint O.R</button>
          <button type="button" class="btn btn-danger btn-lg">Clear Sale</button>
          <button type="button" class="btn btn-outline-secondary btn-lg">Suspend / Save as Quotation</button>
        </div>

      </div>
    </div>
  </div>

</div>

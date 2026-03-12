<!-- Modal Add Branch -->
<div class="modal fade" id="mld-item-registration" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl-title" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      
      <form id="frm-item-registration" class="needs-validation" novalidate>
        
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="mdl-title">Add New Item</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <!-- Modal Body -->
        <div class="modal-body">
          <div class="row g-3">

            <!-- ================= BASIC ITEM INFORMATION ================= -->
            <div class="col-12">
              <div class="card shadow-sm">
                <div class="card-header fw-semibold bg-primary-subtle">
                  Basic Item Information
                </div>
                <div class="card-body">
                  <div class="row g-3">
                    <div class="col-md-4">
                      <label class="form-label">Item Code <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="item-code" required>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Barcode <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="barcode">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Unit of Measure <span class="text-danger">*</span></label>
                      <select class="form-select" id="uom" required>
                        <option value="">Select</option>
                        <option>PCS</option>
                        <option>BOX</option>
                        <option>KG</option>
                        <option>LITER</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Item Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="item-name" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Category <span class="text-danger">*</span></label>
                      <select class="form-select" id="category" required>
                        <option value="">Select Category</option>
                      </select>
                    </div>
                    <div class="col-12">
                      <label class="form-label">Description</label>
                      <textarea class="form-control" id="description" rows="2"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- ================= PURCHASING INFORMATION ================= -->
            <div class="col-12">
              <div class="card shadow-sm">
                <div class="card-header fw-semibold bg-warning-subtle">
                  Purchasing Information
                </div>
                <div class="card-body">
                  <div class="row g-3">
                    <div class="col-md-4">
                      <label class="form-label">Default Supplier</label>
                      <select class="form-select" id="supplier">
                        <option value="">Select Supplier</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Purchase Price <span class="text-danger">*</span></label>
                      <input type="number" step="0.01" class="form-control" id="purchase-price" required>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Costing Method</label>
                      <select class="form-select" id="costing-method">
                        <option>Moving Average</option>
                        <option>FIFO</option>
                        <option>Standard Cost</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Reorder Level</label>
                      <input type="number" class="form-control" id="reorder-level" value="0">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Reorder Quantity</label>
                      <input type="number" class="form-control" id="reorder-qty" value="0">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Purchase Tax Type</label>
                      <select class="form-select" id="purchase-tax">
                        <option>VAT</option>
                        <option>Non-VAT</option>
                        <option>Zero Rated</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- ================= SALES INFORMATION ================= -->
            <div class="col-12">
              <div class="card shadow-sm">
                <div class="card-header fw-semibold bg-success-subtle">
                  Sales Information
                </div>
                <div class="card-body">
                  <div class="row g-3">
                    <div class="col-md-4">
                      <label class="form-label">Selling Price <span class="text-danger">*</span></label>
                      <input type="number" step="0.01" class="form-control" id="selling-price" required>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Wholesale Price</label>
                      <input type="number" step="0.01" class="form-control" id="wholesale-price">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Sales Tax Type</label>
                      <select class="form-select" id="sales-tax">
                        <option>VAT</option>
                        <option>Non-VAT</option>
                        <option>Zero Rated</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="discountable" checked>
                        <label class="form-check-label">
                          Allow Discount
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- ================= INVENTORY CONTROL ================= -->
            <div class="col-12">
              <div class="card shadow-sm">
                <div class="card-header fw-semibold bg-info-subtle">
                  Inventory Control
                </div>
                <div class="card-body">
                  <div class="row g-3">
                    <div class="col-md-4">
                      <label class="form-label">Inventory Type</label>
                      <select class="form-select" id="inventory-type">
                        <option>Stock Item</option>
                        <option>Non-Stock Item</option>
                        <option>Service</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Default Warehouse</label>
                      <select class="form-select" id="warehouse">
                        <option value="GDWHS">Good Warehouse</option>
                        <option value="DFWHS">Defective Warehouse</option>
                        <option value="SVWHS">Service Warehouse</option>
                        <option value="CVWHS">Caravan Warehouse</option>
                        <option value="DSWHS">Display Warehouse</option>
                        <option value="RPWHS">Reposes Warehouse</option>

                      </select>
                    </div>
                    <div class="col-md-4">
                      <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="track-inventory" checked>
                        <label class="form-check-label">
                          Track Inventory
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="track-batch">
                        <label class="form-check-label">
                          Track Batch
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="track-expiry">
                        <label class="form-check-label">
                          Track Expiry
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="track-serial">
                        <label class="form-check-label">
                          Track Serial
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="allow-negative">
                        <label class="form-check-label">
                          Allow Negative Stock
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- ================= OPTIONAL / PROFESSIONAL ================= -->
            <div class="col-12">
              <div class="card shadow-sm">
                <div class="card-header fw-semibold bg-primary-subtle">
                  Optional Details
                </div>
                <div class="card-body">
                  <div class="row g-3">
                    <div class="col-md-4">
                      <label class="form-label">Brand</label>
                      <input type="text" class="form-control" id="brand">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Model</label>
                      <input type="text" class="form-control" id="model">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Weight</label>
                      <input type="number" step="0.01" class="form-control" id="weight">
                    </div>
                    <div class="col-12">
                      <label class="form-label">Internal Notes</label>
                      <textarea class="form-control" id="notes" rows="2"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="btn-submit">
            <span id="btn-text">Save</span>
            <span id="btn-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display:none;"></span>
          </button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-cancel">Cancel</button>
        </div>

      </form>
    </div>
  </div>
</div>

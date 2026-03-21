<form id="frm-add-po">
	<div class="card shadow-sm bg-secondary">
		<!-- HEADER -->
		<div class="card-header d-flex align-items-center bg-dark-subtle">
		    <h5 class="mb-0">Create Purchase Order (Under Development)</h5>
		    <div class="ms-auto btn-group btn-group-sm" role="group" aria-label="PO Actions">
		    	<button type="button" class="btn btn-dark" onclick="loadPurchase_Orders()">
		    	    <i class="bi bi-arrow-clockwise"></i> Refresh
		    	</button>
		        <!-- PO Drafts Dropdown -->
		        <div class="btn-group">
		            <button type="button" class="btn bg-pink dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
		                <i class="bi bi-list-ul me-1"></i> PO Drafts
		            </button>
		            <ul class="dropdown-menu dropdown-menu-end">
		                <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-card-list me-2"></i> PO List</a></li>
		                <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-pencil-square me-2"></i> PO Drafts</a></li>
		            </ul>
		        </div>
		        <!-- Vendor Dropdown -->
		        <div class="btn-group">
		            <button type="button" class="btn btn-warning dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
		                <i class="bi bi-person me-1"></i> Vendor
		            </button>
		            <ul class="dropdown-menu dropdown-menu-end">
		                <li>
		                    <a class="dropdown-item d-flex align-items-center" href="#" onclick="mdladdSupplier()">
		                        <i class="bi bi-person-plus-fill me-2"></i> Add Vendor
		                    </a>
		                </li>
		                <li>
		                    <a class="dropdown-item d-flex align-items-center" href="#">
		                        <i class="bi bi-pencil-square me-2"></i> Vendor Draft
		                    </a>
		                </li>
		                <li>
		                    <a class="dropdown-item d-flex align-items-center" href="#">
		                        <i class="bi bi-people me-2"></i> Vendor List
		                    </a>
		                </li>
		            </ul>
		        </div>
		        <button type="button" class="btn bg-purple" data-bs-toggle="modal" data-bs-target="#modalAddItem">
		            <i class="bi bi-box-seam"></i> Add Item
		        </button>
		        <button type="button" class="btn bg-gradient-green" onclick="mdlAdd_Branch()">
		            <i class="bi bi-plus"></i> Add Branch
		        </button>
		        <button type="button" class="btn btn-secondary" onclick="printPO()">
		            <i class="bi bi-printer"></i> Print / Export
		        </button>
		    </div>
		</div>

		<div class="card-body">

			<!-- PURCHASE ORDER INFORMATION -->
			<div class="mb-2">
			    <h6 class="mb-3 text-white">Purchase Order Information</h6>
			    <div class="row justify-content-between d-flex">
			    	<div class="col-md-2 mb-2">
			    	    <label class="form-label">PO Number</label>
			    	    <input type="text" class="form-control form-control-sm" id="purchase_order_num" disabled required>
			    	</div>
			    	<div class="col-md-1 mb-2">
			    	    <label class="form-label">Date</label>
			    	    <input type="date" name="current-date" id="current-date" class="form-control form-control-sm text-center form-control-plaintext bg-white" value="<?= date('Y-m-d') ?>" disabled>
			    	</div>
			    </div>
			    <div class="row g-3">
			       
			        <div class="col-md-2">
			            <label class="form-label">PO Date:</label>
			            <input type="date" class="form-control border-primary form-control-sm">
			        </div>
			        <div class="col-md-2">
			            <label class="form-label">Delivery Date:</label>
			            <input type="date" class="form-control border-primary form-control-sm">
			        </div>
			        <div class="col-md-2">
			            <label class="form-label">Payment Terms:</label>
			            <select class="form-select form-select-sm border-primary">
			                <option>Cash</option>
			                <option>15 Days</option>
			                <option>30 Days</option>
			            </select>
			        </div>
			        <div class="col-md-2">
			            <label class="form-label">Vendor:</label>
			            <select class="form-select form-select-sm border-primary" id="vendors">
			                <option>Select</option>
			            </select>
			        </div>
			        <div class="col-md-2">
			            <label class="form-label">Branch:</label>
			            <select class="form-select form-select-sm border-primary" id="branches">
			                <option selected value="">Select</option>
			            </select>
			        </div>
			        <div class="col-md-2">
			            <label class="form-label">Warehouse:</label>
			            <select class="form-select form-select-sm border-primary">
			                <option value="">Select</option>
			                <option value="GOODWHS">Good Warehouse</option>
			                <option value="REPOWHS">Reposes Warehouse</option>
			                <option value="DFCTWHS">Damaged Warehouse</option>
			                <option value="CARVWHS">Caravan Warehouse</option>
			                <option value="EXTWHS">Extra Stock</option>
			                <option value="CONSWHS">Consignment Warehouse</option>
			                <option value="TRANWHS">Transit / In-Transit Warehouse</option>
			                <option value="MAINWHS">Main Warehouse</option>
			            </select>
			        </div>
			    </div>
			</div>

			<hr>

			<!-- ITEM SECTION -->
			<div class="mb-3 d-flex justify-content-between align-items-center">
				<h6 class="text-light">Purchased Items</h6>
				<button type="button" class="btn btn-primary btn-sm">
					<i class="bi bi-plus"></i> Add Item
				</button>
			</div>

			<div class="table-responsive overscroll-auto" style="height: 28vh;">
			    <table class="table table-sm table-hover align-middle">
			        <thead class="table-light">
			            <tr>
			                <th style="width:180px;">Item Code</th>
			                <th>Item Name</th>
			                <th style="width:80px;" class="text-end">Qty</th>
			                <th style="width:120px;" class="text-end">Unit Cost</th>
			                <th style="width:120px;" class="text-end">Total</th>
			                <th style="width:70px;" class="text-center">Action</th>
			            </tr>
			        </thead>
			        <tbody id="po-items">
			            <tr>
			                <td>
			                    <input type="text" class="form-control border-primary form-control-sm rounded-1" autocomplete="off" autocomplete="off" required>
			                </td>
			                <td>
			                    <input type="text" class="form-control border-primary form-control-sm rounded-1" autocomplete="off" required>
			                </td>
			                <td>
			                    <input type="number" class="form-control border-primary form-control-sm text-end rounded-1" min="0" value="0" autocomplete="off" required>
			                </td>
			                <td>
			                    <input type="number" class="form-control border-primary form-control-sm text-end rounded-1" min="0" value="0.00" step="0.01" autocomplete="off" required>
			                </td>
			                <td class="text-end">0.00</td>
			                <td class="text-center">
			                    <button class="btn btn-outline-danger btn-sm" type="button" title="Remove Item">
			                        <i class="bi bi-trash"></i>
			                    </button>
			                </td>
			            </tr>
			        </tbody>
			    </table>
			</div>

			<!-- TOTAL SECTION -->
			<div class="row mt-1">
			   <div class="mb-0 col-md-2">
			       <label class="form-label small">Total Qty</label>
			       <input type="text" class="form-control form-control-sm text-end" value="0" readonly>
			   </div>
			   <div class="mb-0 col-md-2">
			       <label class="form-label small">Subtotal</label>
			       <input type="text" class="form-control form-control-sm text-end" value="0.00" readonly>
			   </div>
			   <div class="mb-0 col-md-2">
			       <label class="form-label small">Discount</label>
			       <input type="number" class="form-control border-primary form-control-sm text-end" value="0.00">
			   </div>
			   <div class="mb-0 col-md-2">
			       <label class="form-label fw-bold small">Grand Total</label>
			       <input type="text" class="form-control form-control-sm text-end fw-bold" value="0.00" readonly>
			   </div>
			</div>

			<!-- REMARKS -->
			<div class="mt-3 col-md-4">
				<label class="form-label">Remarks:</label>
				<textarea class="form-control form-control-sm border-primary" rows="2" style="height: 80px;"></textarea>
			</div>

		</div>

		<!-- FOOTER -->
		<div class="card-footer text-end">
			<button class="btn btn-success" type="submit">
				<i class="bi bi-check-circle"></i> Save Purchase Order
			</button>
			<button class="btn bg-warning-subtle" type="button">
				<i class="bi bi-save"></i>	Save Draft
			</button>
			<button class="btn btn-danger" type="reset">Clear</button>
		</div>

	</div>
</form>


			
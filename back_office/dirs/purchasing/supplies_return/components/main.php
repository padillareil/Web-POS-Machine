<form id="frm-supply-return">
	<div class="card shadow-sm bg-secondary">

		<!-- HEADER -->
		<div class="card-header d-flex align-items-center bg-dark-subtle">
		    <h5 class="mb-0">Supply Return</h5>
		    <div class="ms-auto btn-group btn-group-sm">

		    	<button type="button" class="btn btn-dark">
		    	    <i class="bi bi-arrow-clockwise"></i> Refresh
		    	</button>

		        <button type="button" class="btn bg-purple" data-bs-toggle="modal" data-bs-target="#modalAddItem">
		            <i class="bi bi-box-seam"></i> Add Item
		        </button>

		        <button type="button" class="btn btn-secondary">
		            <i class="bi bi-printer"></i> Print
		        </button>
		    </div>
		</div>

		<div class="card-body">

			<!-- RETURN INFORMATION -->
			<div class="mb-2">
			    <h6 class="mb-3 text-white">Return Information</h6>

			    <div class="row">
			    	<div class="col-md-2 mb-2">
			    	    <label class="form-label">Return No.</label>
			    	    <input type="text" class="form-control form-control-sm" disabled>
			    	</div>

			    	<div class="col-md-2 mb-2">
			    	    <label class="form-label">Date</label>
			    	    <input type="date" class="form-control form-control-sm" value="<?= date('Y-m-d') ?>">
			    	</div>

			    	<div class="col-md-3 mb-2">
			    	    <label class="form-label">Reference Doc</label>
			    	    <input type="text" class="form-control form-control-sm" placeholder="PO / GRPO / Invoice">
			    	</div>

			    	<div class="col-md-2 mb-2">
			    	    <label class="form-label">Vendor</label>
			    	    <select class="form-select form-select-sm">
			                <option>Select</option>
			            </select>
			    	</div>

			    	<div class="col-md-2 mb-2">
			    	    <label class="form-label">Branch</label>
			    	    <select class="form-select form-select-sm">
			                <option>Select</option>
			            </select>
			    	</div>
			    </div>

			    <div class="row">
			    	<div class="col-md-2">
			            <label class="form-label">Return Type</label>
			            <select class="form-select form-select-sm">
			                <option>Damaged</option>
			                <option>Excess</option>
			                <option>Wrong Item</option>
			            </select>
			        </div>

			        <div class="col-md-2">
			            <label class="form-label">Warehouse From</label>
			            <select class="form-select form-select-sm">
			                <option>Main Warehouse</option>
			                <option>Good Warehouse</option>
			            </select>
			        </div>

			        <div class="col-md-2">
			            <label class="form-label">Warehouse To</label>
			            <select class="form-select form-select-sm">
			                <option>Damaged Warehouse</option>
			                <option>Return Warehouse</option>
			            </select>
			        </div>
			    </div>
			</div>

			<hr>

			<!-- ITEM SECTION -->
			<div class="mb-3 d-flex justify-content-between align-items-center">
				<h6 class="text-light">Returned Items</h6>
				<button type="button" class="btn btn-primary btn-sm">
					<i class="bi bi-plus"></i> Add Item
				</button>
			</div>

			<div class="table-responsive" style="height: 28vh;">
			    <table class="table table-sm table-hover align-middle">
			        <thead class="table-light">
			            <tr>
			                <th style="width:180px;">Item Code</th>
			                <th>Item Name</th>
			                <th style="width:100px;" class="text-end">Qty</th>
			                <th style="width:200px;">Reason</th>
			                <th style="width:70px;" class="text-center">Action</th>
			            </tr>
			        </thead>
			        <tbody>
			            <tr>
			                <td><input type="text" class="form-control form-control-sm"></td>
			                <td><input type="text" class="form-control form-control-sm"></td>
			                <td><input type="number" class="form-control form-control-sm text-end"></td>
			                <td>
			                    <input type="text" class="form-control form-control-sm" placeholder="Reason">
			                </td>
			                <td class="text-center">
			                    <button class="btn btn-outline-danger btn-sm">
			                        <i class="bi bi-trash"></i>
			                    </button>
			                </td>
			            </tr>
			        </tbody>
			    </table>
			</div>

			<!-- TOTAL -->
			<div class="row mt-2">
			   <div class="col-md-2">
			       <label class="form-label small">Total Qty</label>
			       <input type="text" class="form-control form-control-sm text-end" readonly>
			   </div>
			</div>

			<!-- REMARKS -->
			<div class="mt-3 col-md-4">
				<label class="form-label">Remarks</label>
				<textarea class="form-control form-control-sm" rows="2"></textarea>
			</div>

		</div>

		<!-- FOOTER -->
		<div class="card-footer text-end">
			<button class="btn btn-success" type="submit">
				<i class="bi bi-check-circle"></i> Save Return
			</button>
			<button class="btn btn-danger" type="reset">Clear</button>
		</div>

	</div>
</form>
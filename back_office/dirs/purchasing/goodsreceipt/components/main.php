<form id="frm-add-po">
	<div class="card shadow-sm bg-secondary">
		<!-- HEADER -->
	<div class="card-header d-flex align-items-center bg-dark-subtle">
		<h5 class="mb-0">Goods Receipt</h5>
		<div class="ms-auto btn-group btn-group-sm" role="group">
			<!-- Refresh -->
			<button type="button" class="btn btn-dark" onclick="loadGoodsReceipt()">
				<i class="bi bi-arrow-clockwise"></i> Refresh
			</button>
			<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
				<i class="bi bi-cart-check me-1"></i> Load PO
			</button>
			<ul class="dropdown-menu dropdown-menu-end">
				<li>
					<a class="dropdown-item d-flex align-items-center" href="#">
						<i class="bi bi-card-list me-2"></i> PO List
					</a>
				</li>
				<li>
					<a class="dropdown-item d-flex align-items-center" href="#">
						<i class="bi bi-search me-2"></i> Find PO
					</a>
				</li>
			</ul>
		</div>
		<!-- Goods Receipt Records -->
		<div class="btn-group">
			<button type="button" class="btn bg-pink dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
				<i class="bi bi-archive me-1"></i> Goods Receipt
			</button>
			<ul class="dropdown-menu dropdown-menu-end">
				<li>
					<a class="dropdown-item d-flex align-items-center" href="#">
						<i class="bi bi-list-ul me-2"></i> GR List
					</a>
				</li>
				<li>
					<a class="dropdown-item d-flex align-items-center" href="#">
						<i class="bi bi-clock-history me-2"></i> GR Drafts
					</a>
				</li>
			</ul>
		</div>

		<!-- Inspection -->
		<div class="btn-group">
			<button type="button" class="btn btn-warning dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
				<i class="bi bi-clipboard-check me-1"></i> Inspection
			</button>
			<ul class="dropdown-menu dropdown-menu-end">
				<li>
					<a class="dropdown-item d-flex align-items-center" href="#">
						<i class="bi bi-exclamation-triangle me-2"></i> Defective Items
					</a>
				</li>
				<li>
					<a class="dropdown-item d-flex align-items-center" href="#">
						<i class="bi bi-arrow-return-left me-2"></i> Return to Vendor
					</a>
				</li>
			</ul>
		</div>
		<!-- Add Item -->
		<button type="button" class="btn bg-purple" data-bs-toggle="modal" data-bs-target="#modalAddItem">
			<i class="bi bi-box-seam"></i> Add Item
		</button>
		<!-- Print -->
		<button type="button" class="btn btn-secondary" onclick="printGR()">
			<i class="bi bi-printer"></i> Print GR
		</button>
	</div>
</div>
		<div class="card-body">

			<!-- GOODS RECEIPT INFORMATION -->
			<div class="mb-2">
			    <h6 class="mb-3 text-white">Goods Receipt Information</h6>
			    <div class="row justify-content-between d-flex">
			        <div class="col-md-2 mb-1">
			            <label class="form-label">Goods Receipt No</label>
			            <input type="text" class="form-control form-control-sm " id="goods_receipt_num" disabled required>
			        </div>

			        <div class="col-md-1 mb-1">
			            <label class="form-label">Date</label>
			            <input type="date" id="current-date" class="form-control form-control-sm" value="<?= date('Y-m-d') ?>" disabled>
			        </div>

			        <div class="col-md-2">
			            <label class="form-label">Reference PO</label>
			            <select class="form-select form-select-sm border-primary" id="po_number">
			                <option value="">Select PO</option>
			            </select>
			        </div>

			        <div class="col-md-2">
			            <label class="form-label">Delivery Receipt #</label>
			            <input type="text" class="form-control form-control-sm border-primary">
			        </div>

			        <div class="col-md-2">
			            <label class="form-label">Invoice #</label>
			            <input type="text" class="form-control form-control-sm border-primary">
			        </div>

			        <div class="col-md-2">
			            <label class="form-label">Received By</label>
			            <input type="text" class="form-control form-control-sm border-primary" id="received_by">
			        </div>
			    </div>

			    <div class="row mt-1">

			        <div class="col-md-2">
			            <label class="form-label">Vendor</label>
			            <select class="form-select form-select-sm border-primary" id="vendors">
			                <option>Select</option>
			            </select>
			        </div>

			        <div class="col-md-2">
			            <label class="form-label">Branch</label>
			            <select class="form-select form-select-sm border-primary" id="branches">
			                <option selected value="">Select</option>
			            </select>
			        </div>

			        <div class="col-md-2">
			            <label class="form-label">Warehouse</label>
			            <select class="form-select form-select-sm border-primary">
			                <option value="">Select</option>
			                <option value="GOODWHS">Good Warehouse</option>
			                <option value="REPOWHS">Reposes Warehouse</option>
			                <option value="DFCTWHS">Damaged Warehouse</option>
			                <option value="CARVWHS">Caravan Warehouse</option>
			                <option value="EXTWHS">Extra Stock</option>
			                <option value="CONSWHS">Consignment Warehouse</option>
			                <option value="TRANWHS">Transit Warehouse</option>
			                <option value="MAINWHS">Main Warehouse</option>
			            </select>
			        </div>

			        <div class="col-md-2">
			            <label class="form-label">Inspection Status</label>
			            <select class="form-select form-select-sm border-primary">
			                <option value="PENDING">Pending</option>
			                <option value="PASSED">Passed</option>
			                <option value="FAILED">Failed</option>
			            </select>
			        </div>

			        <div class="col-md-4">
			            <label class="form-label">Remarks</label>
			            <textarea class="form-control form-control-sm border-primary"></textarea>
			        </div>

			    </div>
			</div>

			<hr>

			<!-- RECEIVED ITEMS -->
			<div class="mb-3 d-flex justify-content-between align-items-center">
			    <h6 class="text-light">Received Items</h6>
			    <button type="button" class="btn btn-primary btn-sm" onclick="addItemRow()">
			        <i class="bi bi-plus"></i> Add Item
			    </button>
			</div>

			<div class="table-responsive overscroll-auto" style="height: 28vh;">
				<table class="table table-bordered table-hover align-middle">
					<thead class="table-light">
						<tr>
						    <th style="width:150px;">Item Code</th>
						    <th>Item Name</th>
						    <th style="width:80px;" class="text-end">Ordered</th>
						    <th style="width:80px;" class="text-end">Received</th>
						    <th style="width:80px;" class="text-end">Good</th>
						    <th style="width:80px;" class="text-end">Defective</th>
						    <th style="width:120px;" class="text-end">Unit Cost</th>
						    <th style="width:120px;" class="text-end">Total</th>
						    <th style="width:120px;">Batch/Lot</th>
						    <th style="width:120px;">Expiry</th>
						    <th style="width:70px;" class="text-center">Action</th>
						</tr>
					</thead>

					<tbody id="gr-items">
						<tr id="empty-row">
						  <td colspan="11" class="text-center py-5">
						    <div class="d-flex flex-column align-items-center text-muted">
						      <div class="mb-3" style="font-size: 40px;">
						        <i class="bi bi-file-earmark-text"></i>
						      </div>
						      <div class="fw-semibold">Add Item</div>
						      <div class="small opacity-75">
						        Click the Add Item button to add row.
						      </div>
						    </div>
						  </td>
						</tr>
					</tbody>
				</table>
			</div>

			<!-- TOTAL SECTION -->
			<div class="row mt-2">
				<div class="col-md-2">
					<label class="form-label small">Total Received</label>
					<input type="text" class="form-control form-control-sm text-end" value="0" readonly id="total_received">
				</div>

				<div class="col-md-2">
					<label class="form-label small">Total Good Condition</label>
					<input type="text" class="form-control form-control-sm text-end" value="0" readonly id="total_accepted">
				</div>

				<div class="col-md-2">
					<label class="form-label small">Total Defective</label>
					<input type="text" class="form-control form-control-sm text-end" value="0" readonly id="total_defective">
				</div>

				<div class="col-md-2">
					<label class="form-label small">Subtotal</label>
					<input type="text" class="form-control form-control-sm text-end" value="0.00" readonly id="subtotal">
				</div>

				<div class="col-md-2">
					<label class="form-label small">Adjustment</label>
					<input type="number" class="form-control border-primary form-control-sm text-end" value="0.00" id="adjustment">
				</div>

				<div class="col-md-2">
					<label class="form-label fw-bold small">Grand Total</label>
					<input type="text" class="form-control form-control-sm text-end fw-bold" value="0.00" readonly id="grand_total">
				</div>
			</div>
		</div>

		<!-- FOOTER -->
		<div class="card-footer text-end">
			<button class="btn btn-success" type="submit">
				<i class="bi bi-check-circle"></i> Post Receipt
			</button>
			<button class="btn bg-warning-subtle" type="button">
				<i class="bi bi-save"></i> Save Draft
			</button>
			<button class="btn btn-info" type="button">
				<i class="bi bi-arrow-return-left"></i> Return Items
			</button>
			<button class="btn btn-danger" type="reset">
				<i class="bi bi-x-circle"></i> Clear
			</button>
		</div>

	</div>
</form>

<script>


/*Function add new rows*/
function addItemRow() {
    $("#empty-row").remove();

    let row = `
        <tr>
            <td>
                <input type="text" class="form-control border-primary form-control-sm item-code">
            </td>
            <td>
                <input type="text" class="form-control border-primary form-control-sm item-name">
            </td>
            <td>
                <input type="number" class="form-control form-control-sm text-end" value="0" >
            </td>
	    	<td>
	    	    <input type="number" class="form-control border-primary form-control-sm text-end received" value="0">
    		</td>
    		<td>
    		    <input type="number" class="form-control border-primary form-control-sm text-end good" value="0">
    		</td>
            <td>
                <input type="number" class="form-control border-primary form-control-sm text-end defective" value="0">
            </td>
            <td>
                <input type="number" step="0.01" class="form-control border-primary form-control-sm text-end cost" value="0.00">
            </td>
            <td class="text-end total">0.00</td>
            <td>
                <input type="text" class="form-control border-primary form-control-sm remarks">
            </td>
            <td>
                <input type="date" class="form-control border-primary form-control-sm expiry">
            </td>
            <td class="text-center">
                <button class="btn btn-outline-danger btn-remove btn-sm" type="button">
                    <i class="bi bi-trash"></i>
                </button>
            </td>
        </tr>
    `;

    $("#gr-items").append(row);
}

$(document).on("click", ".btn-remove", function () {
    $(this).closest("tr").remove();
    if ($("#gr-items tr").length === 0) {
        let emptyRow = `
        <tr id="empty-row">
          <td colspan="11" class="text-center py-5">
            <div class="d-flex flex-column align-items-center text-muted">
              <div class="mb-3" style="font-size: 40px;">
                <i class="bi bi-file-earmark-text"></i>
              </div>
              <div class="fw-semibold">Add Item</div>
              <div class="small opacity-75">
                Click the Add Item button to add row.
              </div>
            </div>
          </td>
        </tr>
        `;
        $("#gr-items").html(emptyRow);
    }
});

/*Version 1 of inputs*/
$(document).on("input", ".received, .total, .good, .defective, .cost, #adjustment", function () {
    computeGR();
});


function computeGR() {
    let totalReceived = 0;
    let totalAccepted = 0;
    let totalDefective = 0;
    let subtotal = 0;

    $("#gr-items tr").each(function () {
        let received = parseFloat($(this).find(".received").val()) || 0;
        let good = parseFloat($(this).find(".good").val()) || 0;
        let defective = parseFloat($(this).find(".defective").val()) || 0;
        let cost = parseFloat($(this).find(".cost").val()) || 0;

        // validation
        if (good + defective > received) {
            $(this).find(".good, .defective").addClass("is-invalid");
        } else {
            $(this).find(".good, .defective").removeClass("is-invalid");
        }

        let lineTotal = good * cost;
        $(this).find(".total").text(lineTotal.toFixed(2));

        totalReceived += received;
        totalAccepted += good;
        totalDefective += defective;
        subtotal += lineTotal;
    });

    let adjustment = parseFloat($("#adjustment").val()) || 0;
    let grandTotal = subtotal + adjustment;

    $("#total_received").val(totalReceived);
    $("#total_accepted").val(totalAccepted);
    $("#total_defective").val(totalDefective);
    $("#subtotal").val(subtotal.toFixed(2));
    $("#grand_total").val(grandTotal.toFixed(2));
}

// Listen for input changes version2 
// $(document).on("input", ".received, .good, .defective, .cost, #adjustment", function () {
//     autoSuggestAcceptedDefective($(this).closest("tr"));
//     computeGR();
// });

// function autoSuggestAcceptedDefective($row) {
//     let received = parseFloat($row.find(".received").val()) || 0;
//     let accepted = parseFloat($row.find(".accepted").val()) || 0;
//     let defective = parseFloat($row.find(".defective").val()) || 0;

//     // Auto-fill logic
//     if ($(this).hasClass("received") || (accepted === 0 && defective === 0)) {
//         $row.find(".accepted").val(received);
//         $row.find(".defective").val(0);
//     } else if ($(this).hasClass("accepted")) {
//         $row.find(".defective").val(Math.max(received - accepted, 0));
//     } else if ($(this).hasClass("defective")) {
//         $row.find(".accepted").val(Math.max(received - defective, 0));
//     }

//     // Prevent sum > received
//     accepted = parseFloat($row.find(".accepted").val()) || 0;
//     defective = parseFloat($row.find(".defective").val()) || 0;
//     if (accepted + defective > received) {
//         if ($(this).hasClass("accepted")) {
//             $row.find(".defective").val(Math.max(received - accepted, 0));
//         } else {
//             $row.find(".accepted").val(Math.max(received - defective, 0));
//         }
//     }
// }

// // Compute totals
// function computeGR() {
//     let totalReceived = 0;
//     let totalAccepted = 0;
//     let totalDefective = 0;
//     let subtotal = 0;

//     $("#gr-items tr").each(function () {
//         let received = parseFloat($(this).find(".received").val()) || 0;
//         let accepted = parseFloat($(this).find(".accepted").val()) || 0;
//         let defective = parseFloat($(this).find(".defective").val()) || 0;
//         let cost = parseFloat($(this).find(".cost").val()) || 0;

//         // Validation: accepted + defective cannot exceed received
//         if (accepted + defective > received) {
//             $(this).find(".accepted, .defective").addClass("is-invalid");
//         } else {
//             $(this).find(".accepted, .defective").removeClass("is-invalid");
//         }

//         // Compute line total for accepted items only
//         let lineTotal = accepted * cost;
//         $(this).find(".total").text(lineTotal.toFixed(2));

//         // Add to each total separately
//         totalReceived += received;
//         totalAccepted += accepted;
//         totalDefective += defective;
//         subtotal += lineTotal;
//     });

//     let adjustment = parseFloat($("#adjustment").val()) || 0;
//     let grandTotal = subtotal + adjustment;

//     $("#total_received").val(totalReceived);
//     $("#total_accepted").val(totalAccepted);
//     $("#total_defective").val(totalDefective);
//     $("#subtotal").val(subtotal.toFixed(2));
//     $("#grand_total").val(grandTotal.toFixed(2));
// }
</script>
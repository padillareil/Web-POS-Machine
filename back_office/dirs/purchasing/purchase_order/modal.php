<!-- Modal Add Branch  -->
<form id="frm-add-branch">
    <div class="modal fade" id="mdl-add-branch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdlAddBranchLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="mdlAddBranchLabel">Add Branch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label for="branch_code" class="form-label">Branch Code:</label>
                            <input type="text" class="form-control form-control-sm" id="branch_code" placeholder="e.g. MAIN" required>
                        </div>

                        <div class="col-md-6">
                            <label for="branch_name" class="form-label">Branch Name:</label>
                            <input type="text" class="form-control form-control-sm" id="branch_name" placeholder="Full branch name" required>
                        </div>

                        <div class="col-md-12">
                            <label for="branch_address" class="form-label">Address / Location:</label>
                            <textarea class="form-control form-control-sm" id="branch_address" rows="2" placeholder="Street, City, Province"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="contact_person" class="form-label">Contact Person:</label>
                            <input type="text" class="form-control form-control-sm" id="contact_person" placeholder="Manager or In-charge">
                        </div>

                        <div class="col-md-6">
                            <label for="contact_number" class="form-label">Contact Number:</label>
                            <input type="text" class="form-control form-control-sm" id="contact_number" placeholder="0912-345-6789">
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control form-control-sm" id="email" placeholder="branch@email.com">
                        </div>

                        <div class="col-md-6">
                            <label for="warehouse_type" class="form-label">Warehouse Typ:</label>
                            <select class="form-select form-select-sm" id="warehouse_type">
                                <option value="">Select Type</option>
                                <option value="goodwhs">Good Warehouse</option>
                                <option value="repowhs">Repair Warehouse</option>
                                <option value="defective">Defective Warehouse</option>
                                <option value="caravan">Caravan / Mobile</option>
                                <option value="overflow">Overflow Stock</option>
                                <option value="consignment">Consignment</option>
                                <option value="transit">In-Transit</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</form>
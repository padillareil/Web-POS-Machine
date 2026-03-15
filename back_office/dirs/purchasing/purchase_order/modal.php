<!-- Modal Add Branch  -->
<form id="frm-add-branch">
    <div class="modal fade" id="mdl-add-branch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdlAddBranchLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title text-light" id="mdlAddBranchLabel">Add Branch</h5>
                    <button type="button" class="btn-close action-branch-btn" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Code Mode -->
                        <div class="col-12 ml-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="b-code-controller">
                                <label class="form-check-label fw-semibold" id="branch-code-label" for="b-code-controller">
                                       Manual 
                                </label>
                            </div>
                            <small class="text-muted">If enabled, branch code will be generated automatically from branch name.</small>
                        </div>

                        <!-- Branch Code -->
                        <div class="col-md-6">
                            <label for="branch_code" class="form-label">Branch code</label>
                            <input type="text" class="form-control form-control-sm" id="branch_code" maxlength="4" placeholder="Auto" autocomplete="off">
                        </div>

                        <!-- Branch Name -->
                        <div class="col-md-6">
                            <label for="branch_name" class="form-label">Branch name</label>
                            <input type="text" class="form-control form-control-sm text-uppercase" id="branch_name" required autocomplete="off">
                        </div>

                        <!-- Address -->
                        <div class="col-md-12">
                            <label for="branch_address" class="form-label">Location</label>
                            <textarea class="form-control form-control-sm" id="branch_address" rows="2" placeholder="Street, City, Province" autocomplete="off" required></textarea>
                        </div>

                        <!-- Contact Person -->
                        <div class="col-md-6">
                            <label class="form-label">Contact person</label>
                            <input type="text" class="form-control form-control-sm" id="contact_person" autocomplete="off">
                        </div>

                        <!-- Contact Number -->
                        <div class="col-md-6">
                            <label class="form-label">Contact number</label>
                            <input type="text" class="form-control form-control-sm" id="contact_number" autocomplete="off">
                        </div>

                        <!-- Email -->
                        <div class="col-md-12">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control form-control-sm" id="email" autocomplete="off">
                        </div>

                        <!-- Branch Size -->
                        <div class="col-md-6">
                            <label class="form-label">Branch size</label>
                            <select class="form-select form-select-sm" id="branch_type" autocomplete="off" required>
                                <option value="">Select</option>
                                <option value="Main">Main / Head Office</option>
                                <option value="Large">Large Store</option>
                                <option value="Medium">Medium Store</option>
                                <option value="Small">Small Store / Kiosk</option>
                            </select>
                        </div>

                        <!-- Ownership -->
                        <div class="col-md-6">
                            <label class="form-label">Business space</label>
                            <select class="form-select form-select-sm" id="property_ownership" autocomplete="off" required>
                                <option value="">Select</option>
                                <option value="company_owned">Company Owned</option>
                                <option value="rented">Rented / Leased</option>
                                <option value="franchise">Franchise</option>
                                <option value="partner">Partner Operated</option>
                                <option value="consignment">Consignment Space</option>
                                <option value="temporary">Temporary / Event</option>
                            </select>
                        </div>

                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-success action-branch-btn" id="branch-submit">
                        <span id="btn-text">Save</span>
                        <span id="btn-spinner" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                    </button>
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" id="branch-close">Close</button>
                </div>

            </div>
        </div>
    </div>
</form>

<script>
/*Function branch code auto generator*/
    $("#b-code-controller").on("change", function(){
        if($(this).is(":checked")){
            // AUTO MODE
            $("#branch_code")
                .prop("readonly", true)
                .val("")
                .attr("placeholder","Auto");
            $("#branch-code-label").text("Auto Generate");

        }else{
            // MANUAL MODE
            $("#branch_code")
                .prop("readonly", false)
                .val("")
                .attr("placeholder","Manual");
            $("#branch-code-label").text("Manual");
        }
    });

/*Function create branch*/
    $("#branch_name").on("input", function () {
        if ($("#b-code-controller").is(":checked")) {
            let name = $(this).val()
                .replace(/[^a-zA-Z0-9]/g, "") // allow numbers
                .toUpperCase();
            if (name.length >= 4) {
                let code = name.substring(0,3) + name.substring(name.length - 1);
                $("#branch_code").val(code);
            } else {
                $("#branch_code").val(name);
            }
        }
    });

    /*Function submit branch*/
    $("#frm-add-branch").submit(function(event){
        event.preventDefault();
        $(".action-branch-btn").prop("disabled", true).css("cursor","not-allowed");
        $("#btn-text-branch").text("Saving...");
        $("#btn-spinner-branch").removeClass("d-none");
        var BranchCode = $("#branch_code").val();
        var BranchName = $("#branch_name").val();
        var Location = $("#branch_address").val();
        var ContactPerson = $("#contact_person").val();
        var ContactNumber = $("#contact_number").val();
        var Email = $("#email").val();
        var BranchSize = $("#branch_type").val();
        var BusinessSpace = $("#property_ownership").val();

        $.post("dirs/purchasing/purchase_order/actions/save_branch.php", {

            BranchCode : BranchCode,
            BranchName : BranchName,
            Location : Location,
            ContactPerson : ContactPerson,
            ContactNumber : ContactNumber,
            Email : Email,
            BranchSize : BranchSize,
            BusinessSpace : BusinessSpace,

        }, function(data){
            $(".action-branch-btn").prop("disabled", false).css("cursor","pointer");
            $("#btn-text-branch").text("Save");
            $("#btn-spinner-branch").addClass("d-none");
            if($.trim(data) === "OK"){
                load_PONUmber();
                loadVendors();
                $("#frm-add-branch")[0].reset();
                $("#mdl-add-branch").modal("hide");
                Swal.fire({
                    icon: "success",
                    title: "New Branch",
                    text: "Successfully added."
                });
            }else{
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: data
                });
            }
        }).fail(function(){
            $(".action-branch-btn").prop("disabled", false).css("cursor","pointer");
            $("#btn-text-branch").text("Save");
            $("#btn-spinner-branch").addClass("d-none");
            Swal.fire({
                icon: "error",
                title: "Connection Error",
                text: "Unable to process request."
            });
        })
    });
</script>


<!-- Modal Add Vendor -->
<form id="frm-add-supplier">
    <div class="modal fade" id="mdl-add-supplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdlAddSupplier" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title text-light" id="mdlAddSupplier">Add Vendor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Vendor Code -->
                        <div class="col-md-4">
                            <label for="vendor_code" class="form-label">Vendor Code</label>
                            <input type="text" class="form-control form-control-plaintext  form-control-sm" id="vendor_code" required disabled>
                        </div>

                        <!-- Vendor Name -->
                        <div class="col-md-8">
                            <label for="vendor_name" class="form-label">Vendor Name</label>
                            <input type="text" class="form-control form-control-sm" id="vendor_name" required autocomplete="off" required>
                        </div>

                        <!-- Contact Info -->
                        <div class="col-md-6">
                            <label class="form-label">Contact Person</label>
                            <input type="text" class="form-control form-control-sm" id="vendor_contact_person" placeholder="Manager" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Number</label>
                            <input type="text" class="form-control form-control-sm" id="vendor_contact_number" placeholder="0912-345-6789" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control form-control-sm" id="vendor_email" placeholder="example@email.com" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Website</label>
                            <input type="text" class="form-control form-control-sm" id="vendor_website" placeholder="www.example.com" autocomplete="off" required>
                        </div>

                        <!-- Address -->
                        <div class="col-md-12">
                            <label class="form-label">Billing Address</label>
                            <textarea class="form-control form-control-sm" id="vendor_billing_address" rows="2" placeholder="Street, City, Province" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Shipping Address</label>
                            <textarea class="form-control form-control-sm" id="vendor_shipping_address" rows="2" placeholder="Street, City, Province" required></textarea>
                        </div>

                        <!-- Payment / Bank -->
                        <div class="col-md-4">
                            <label class="form-label">Payment Terms</label>
                            <select class="form-select form-select-sm" id="vendor_payment_terms" required>
                                <option value="">Select</option>
                                <option value="Cash">Cash</option>
                                <option value="15 Days">15 Days</option>
                                <option value="30 Days">30 Days</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Bank</label>
                            <input type="text" class="form-control form-control-sm" id="vendor_bank_name" placeholder="Bank Name" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Account Name</label>
                            <input type="text" class="form-control form-control-sm" id="vendor_accountname" placeholder="Account name" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Bank Account No.</label>
                            <input type="text" class="form-control form-control-sm" id="vendor_bank_account" placeholder="Account No." required>
                        </div>

                        <!-- Status / Remarks -->
                        <div class="col-md-6">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="vendor_status" checked>
                                <label class="form-check-label fw-semibold" for="vendor_status">
                                    Active Vendor
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Remarks / Notes</label>
                            <textarea class="form-control form-control-sm" id="vendor_remarks" placeholder="Optional notes"></textarea>
                        </div>

                    </div>
                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-success action-btn" id="btn-submit">
                        <span id="btn-text">Save</span>
                        <span id="btn-spinner" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                    </button>
                    <button type="button" class="btn btn-sm btn-primary action-btn" id="btn-draft">Draft</button>
                    <button type="reset" class="btn btn-sm btn-danger action-btn" id="btn-clear">Clear</button>
                    <button type="button" class="btn btn-sm btn-secondary action-btn" data-bs-dismiss="modal" id="btn-close">Close</button>
                </div>

            </div>
        </div>
    </div>
</form>

<script>
    $("#frm-add-supplier").submit(function(event){
        event.preventDefault();
        $(".action-btn").prop("disabled", true).css("cursor","not-allowed");
        $("#btn-text").text("Saving...");
        $("#btn-spinner").removeClass("d-none");
        var VendorCode = $("#vendor_code").val();
        var VendorName = $("#vendor_name").val();
        var ContactPerson = $("#vendor_contact_person").val();
        var ContactNumber = $("#vendor_contact_number").val();
        var Email = $("#vendor_email").val();
        var Website = $("#vendor_website").val();
        var BillingAddress = $("#vendor_billing_address").val();
        var Shipping = $("#vendor_shipping_address").val();
        var PaymentTerms = $("#vendor_payment_terms").val();
        var Bank = $("#vendor_bank_name").val();
        var AccountName = $("#vendor_accountname").val();
        var AccountNumber = $("#vendor_bank_account").val();
        var Status = $("#vendor_status").val();
        var Remarks = $("#vendor_remarks").val();

        $.post("dirs/purchasing/purchase_order/actions/save_vendor.php", {

            VendorCode : VendorCode,
            VendorName : VendorName,
            ContactPerson : ContactPerson,
            ContactNumber : ContactNumber,
            Email : Email,
            Website : Website,
            BillingAddress : BillingAddress,
            Shipping : Shipping,
            PaymentTerms : PaymentTerms,
            Bank : Bank,
            AccountName : AccountName,
            AccountNumber : AccountNumber,
            Status : Status,
            Remarks : Remarks

        }, function(data){
            $(".action-btn").prop("disabled", false).css("cursor","pointer");
            $("#btn-text").text("Save");
            $("#btn-spinner").addClass("d-none");
            if($.trim(data) === "OK"){
                load_PONUmber();
                loadVendors();
                $("#frm-add-supplier")[0].reset();
                $("#mdl-add-supplier").modal("hide");
                Swal.fire({
                    icon: "success",
                    title: "New Vendor",
                    text: "Successfully added."
                });
            }else{
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: data
                });
            }
        }).fail(function(){
            $(".action-btn").prop("disabled", false).css("cursor","pointer");
            $("#btn-text").text("Save");
            $("#btn-spinner").addClass("d-none");
            Swal.fire({
                icon: "error",
                title: "Connection Error",
                text: "Unable to process request."
            });
        });
    });
</script>
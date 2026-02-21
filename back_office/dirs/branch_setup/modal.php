<!-- Modal Add Branch -->
<div class="modal fade" id="mld-add-branch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl-title" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      
      <form id="frm-add-branch" class="needs-validation" novalidate>
        
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="mdl-title">New Branch</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <!-- Modal Body -->
        <div class="modal-body">

          <!-- Row 1: Branch Name & Code -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="branchName" class="form-label">Branch Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="branchName" name="branchName" placeholder="Enter Branch Name" required>
              <div class="invalid-feedback">Branch Name is required.</div>
            </div>
            <div class="col-md-6">
              <label for="branchCode" class="form-label">Branch Code <span class="text-danger">*</span></label>
              <input type="text" class="form-control text-uppercase" maxlength="4" id="branchCode" name="branchCode" required>
              <div class="invalid-feedback">Branch Code is required.</div>
            </div>
          </div>

          <!-- Row 2: Branch Type & Status -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="branchType" class="form-label">Branch Type</label>
              <select class="form-select" id="branchType" name="branchType" required>
                <option value="">Select Type</option>
                <option value="HQ">HQ</option>
                <option value="Outlet">Outlet</option>
                <option value="Warehouse">Warehouse</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="branchStatus" class="form-label">Status</label>
              <select class="form-select" id="branchStatus" name="branchStatus" required>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
          </div>
          <!-- Row 2b: Branch Size / Category -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="branchSize" class="form-label">Branch Size / Category</label>
              <select class="form-select" id="branchSize" name="branchSize" required>
                <option value="">Select Category</option>
                <option value="Store">Store / Full Outlet</option>
                <option value="Rented Space">Rented Space</option>
                <option value="Small Outlet">Small Outlet</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="leaseStatus" class="form-label">Lease Status</label>
              <select class="form-select" id="leaseStatus" name="leaseStatus" required>
                <option value="Owned">Owned</option>
                <option value="Rented">Rented</option>
              </select>
            </div>
          </div>

          <!-- Row 3: Address -->
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Street, Building, etc." required>
          </div>

          <div class="row mb-3">
            <div class="col-md-3">
              <label for="city" class="form-label">City / Municipality</label>
              <input type="text" class="form-control" id="city" name="city"  required>
            </div>
            <div class="col-md-3">
              <label for="province" class="form-label">Province</label>
              <input type="text" class="form-control" id="province" name="province" required>
            </div>
            <div class="col-md-3">
              <label for="zip" class="form-label">ZIP Code</label>
              <input type="text" class="form-control" id="zip" name="zip" placeholder="4 digits" pattern="\d{4}" maxlength="4" required>
              <div class="invalid-feedback">ZIP code must be 4 digits.</div>
            </div>
            <div class="col-md-3">
              <label for="country" class="form-label">Country</label>
              <input type="text" class="form-control" id="country" name="country" value="Philippines" readonly>
            </div>
          </div>

          <!-- Row 4: Contact Info -->
          <div class="row mb-3">
            <div class="col-md-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="tel" class="form-control" id="phone" name="phone" placeholder="e.g. 0917xxxxxxx" required>
            </div>
            <div class="col-md-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="example@company.com" required>
            </div>
            <div class="col-md-3">
              <label for="managerName" class="form-label">Manager Name</label>
              <input type="text" class="form-control" id="managerName" name="managerName">
            </div>
            <div class="col-md-3">
              <label for="managerContact" class="form-label">Manager Contact</label>
              <input type="tel" class="form-control" id="managerContact" name="managerContact" placeholder="e.g. 0917xxxxxxx">
            </div>
          </div>

          <!-- Row 5: Operational Details -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="openingHours" class="form-label">Opening Hours</label>
              <input type="time" class="form-control" id="openingHours" name="openingHours" placeholder="09:00" required>
            </div>
            <div class="col-md-6">
              <label for="closingHours" class="form-label">Closing Hours</label>
              <input type="time" class="form-control" id="closingHours" name="closingHours" placeholder="18:00" required>
            </div>
          </div>

          <!-- Row 6: Accounting / Tax -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="tin" class="form-label">Business TIN Number</label>
              <input type="text" class="form-control" id="tin" name="tin" placeholder="e.g. 123-456-789">
            </div>
            <div class="col-md-6">
              <label for="businessPermit" class="form-label">Business Permit Number</label>
              <input type="text" class="form-control" id="businessPermit" name="businessPermit">
            </div>
          </div>

        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="submit" class="btn-success" id="btn-submit">
            <span id="btn-text">Save</span>
            <span id="btn-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display:none;"></span>
          </button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-cancel">Cancel</button>
        </div>

      </form>
    </div>
  </div>
</div>


<script>
  var Submit = $("#btn-submit");
  var Cancel = $("#btn-cancel");

  $("#frm-add-branch").submit(function(event){
      event.preventDefault();

      // Disable buttons and show spinner
      Submit.prop("disabled", true);
      Cancel?.prop("disabled", true); // optional if you have cancel
      $("#btn-text").text("Loading.. Please wait");
      $("#btn-spinner").show();
      Submit.css("cursor", "not-allowed");

      // Collect form values
      var Branch        = $("#branchName").val();
      var Bcode         = $("#branchCode").val();
      var BType         = $("#branchType").val();
      var Status        = $("#branchStatus").val();
      var Category      = $("#branchSize").val();
      var Lease         = $("#leaseStatus").val();
      var Address       = $("#address").val(); // corrected id
      var Municipality  = $("#city").val();
      var Province      = $("#province").val();
      var ZipCode       = $("#zip").val();
      var Country       = $("#country").val();
      var Phone         = $("#phone").val();
      var Email         = $("#email").val();
      var Manager       = $("#managerName").val();
      var ManagerContact= $("#managerContact").val();
      var Opening       = $("#openingHours").val();
      var Closing       = $("#closingHours").val();
      var Tin           = $("#tin").val();
      var Permit        = $("#businessPermit").val();

      // AJAX POST
      $.post("dirs/branch_setup/actions/save_branch.php", {
          Branch: Branch,
          Bcode: Bcode,
          BType: BType,
          Status: Status,
          Category: Category,
          Lease: Lease,
          Address: Address,
          Municipality: Municipality,
          Province: Province,
          ZipCode: ZipCode,
          Country: Country,
          Phone: Phone,
          Email: Email,
          Manager: Manager,
          ManagerContact: ManagerContact,
          Opening: Opening,
          Closing: Closing,
          Tin: Tin,
          Permit: Permit
      })
      .done(function(data){
          if($.trim(data) === "OK"){
              // Reset form
              $("#frm-add-branch")[0].reset();

              // Hide modal
              $("#mld-add-branch").modal('hide');

              Swal.fire({
                  icon: 'success',
                  title: 'New Branch Added.',
                  text: 'Successfully'
              });
          }else{
              Swal.fire({
                  icon: 'error',
                  title: 'Error.',
                  text: data
              });
          }
      })
      .fail(function(xhr, status, error){
          Swal.fire({
              icon: 'error',
              title: 'Network Error',
              text: 'Please check your internet connection and try again.'
          });
      })
      .always(function(){
          // Re-enable buttons and reset spinner/text
          Submit.prop("disabled", false);
          Cancel?.prop("disabled", false);
          $("#btn-text").text("Save");
          $("#btn-spinner").hide();
          Submit.css("cursor", "pointer");
      });
  });
</script>
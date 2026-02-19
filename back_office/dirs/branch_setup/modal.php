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
              <input type="text" class="form-control" id="branchCode" name="branchCode" placeholder="Enter Branch Code" required>
              <div class="invalid-feedback">Branch Code is required.</div>
            </div>
          </div>

          <!-- Row 2: Branch Type & Status -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="branchType" class="form-label">Branch Type</label>
              <select class="form-select" id="branchType" name="branchType">
                <option value="">Select Type</option>
                <option value="HQ">HQ</option>
                <option value="Outlet">Outlet</option>
                <option value="Warehouse">Warehouse</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="branchStatus" class="form-label">Status</label>
              <select class="form-select" id="branchStatus" name="branchStatus">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
          </div>

          <!-- Row 3: Address -->
          <div class="mb-3">
            <label for="address1" class="form-label">Address Line 1</label>
            <input type="text" class="form-control" id="address1" name="address1" placeholder="Street, Building, etc.">
          </div>

          <div class="row mb-3">
            <div class="col-md-3">
              <label for="city" class="form-label">City</label>
              <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="col-md-3">
              <label for="state" class="form-label">State</label>
              <input type="text" class="form-control" id="state" name="state">
            </div>
            <div class="col-md-3">
              <label for="zip" class="form-label">ZIP Code</label>
              <input type="text" class="form-control" id="zip" name="zip" placeholder="4 digits" pattern="\d{4}" maxlength="4">
              <div class="invalid-feedback">ZIP code must be 4 digits.</div>
            </div>
            <div class="col-md-3">
              <label for="country" class="form-label">Country</label>
              <input type="text" class="form-control" id="country" name="country">
            </div>
          </div>

          <!-- Row 4: Contact Info -->
          <div class="row mb-3">
            <div class="col-md-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="tel" class="form-control" id="phone" name="phone">
            </div>
            <div class="col-md-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="col-md-3">
              <label for="managerName" class="form-label">Manager Name</label>
              <input type="text" class="form-control" id="managerName" name="managerName">
            </div>
            <div class="col-md-3">
              <label for="managerContact" class="form-label">Manager Contact</label>
              <input type="tel" class="form-control" id="managerContact" name="managerContact">
            </div>
          </div>

          <!-- Row 5: Operational Details -->
          <div class="row mb-3">
            <div class="col-md-4">
              <label for="currency" class="form-label">Currency</label>
              <input type="text" class="form-control" id="currency" name="currency" value="PHP">
            </div>
            <div class="col-md-4">
              <label for="timezone" class="form-label">Time Zone</label>
              <select class="form-select" id="timezone" name="timezone">
                <option value="Asia/Manila">Asia/Manila</option>
                <option value="UTC">UTC</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="openingHours" class="form-label">Opening Hours</label>
              <input type="text" class="form-control" id="openingHours" name="openingHours" placeholder="09:00 - 18:00">
            </div>
          </div>

          <!-- Row 6: Accounting / Tax -->
          <div class="row mb-3">
            <div class="col-md-4">
              <label for="costCenter" class="form-label">Cost Center</label>
              <input type="text" class="form-control" id="costCenter" name="costCenter">
            </div>
            <div class="col-md-4">
              <label for="taxCode" class="form-label">Tax Code</label>
              <input type="text" class="form-control" id="taxCode" name="taxCode">
            </div>
            <div class="col-md-4">
              <label for="departmentCode" class="form-label">Department Code</label>
              <input type="text" class="form-control" id="departmentCode" name="departmentCode">
            </div>
          </div>

          <!-- Row 7: Logo, Printer -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="logoUpload" class="form-label">Logo Upload</label>
              <input type="file" class="form-control" id="logoUpload" name="logoUpload" accept="image/*">
            </div>
            <div class="col-md-6">
              <label for="printerSetup" class="form-label">Printer Setup</label>
              <input type="text" class="form-control" id="printerSetup" name="printerSetup" placeholder="Printer Name/ID">
            </div>
          </div>

          <!-- Notes -->
          <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
          </div>

        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>

      </form>
    </div>
  </div>
</div>

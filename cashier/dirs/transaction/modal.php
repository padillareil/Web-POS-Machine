<!-- Modal Search Item -->
<div class="modal" id="mld-search-item"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl-title" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="mdl-title">Item Lookup</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card shadow-sm">
          <div class="card-header">
            <input type="search" name="search-itemname" id="search-itemname" class="form-control border-primary mb-2" placeholder="Search item...">
          </div>
          <div class="card-body">
            <div class="table-responsive overscroll-auto" style="height: 55vh;">
              <table class="table table-sm table-bordered table-hovered">
                <thead>
                  <tr>
                    <th>Description</th>
                    <th>Item Number</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="3" class="text-center py-5">
                      <div class="d-flex flex-column align-items-center text-muted">
                        <div class="mb-3" style="font-size: 40px; opacity: .35;">
                          <i class="fa fa-file"></i>
                        </div>
                        <div class="fw-semibold">No Record Found.</div>
                        <div class="small opacity-75">
                          Please search to find item displayed.
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-secondary">Preview</button>
            <button type="button" class="btn btn-secondary">Next</button>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
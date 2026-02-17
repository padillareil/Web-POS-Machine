<div id="gen-spinner" hidden>
  <div class="d-flex justify-content-center" hidden>
    <div class="spinner-border" role="status">
      <span class="visually-hidden"></span>
    </div>
  </div>
</div>
<div id="gen-btn-spinner" class="justify-content-center" hidden>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    <span class="visually-hidden"></span>
</div>
<script>
  function gen_spinner(spinnersize, spinnerclass){
    $("#gen-spinner").find("div[name='spinner-holder']")
    .removeClass("text-primary")
    .removeClass("text-secondary")
    .removeClass("text-success")
    .removeClass("text-danger")
    .removeClass("text-warning")
    .removeClass("text-info")
    .removeClass("text-light")
    .removeClass("text-dark")
    .removeClass("spinner-border-xs")
    .removeClass("spinner-border-sm")
    .removeClass("spinner-border-md")
    .removeClass("spinner-border-lg")
    .removeClass("spinner-border-xl")
    $("#gen-spinner").find("div[name='spinner-holder']")
    .addClass(spinnersize)
    .addClass(spinnerclass);
    return $("#gen-spinner").html();
  }
  function gen_btn_spinner(spinnersize, spinnerclass){
    $("#gen-btn-spinner").find("div[name='spinner-holder']")
    .removeClass("text-primary")
    .removeClass("text-secondary")
    .removeClass("text-success")
    .removeClass("text-danger")
    .removeClass("text-warning")
    .removeClass("text-info")
    .removeClass("text-light")
    .removeClass("text-dark")
    .removeClass("spinner-border-xs")
    .removeClass("spinner-border-sm")
    .removeClass("spinner-border-md")
    .removeClass("spinner-border-lg")
    .removeClass("spinner-border-xl")
    $("#gen-btn-spinner").find("div[name='spinner-holder']")
    .addClass(spinnersize)
    .addClass(spinnerclass);
    return $("#gen-btn-spinner").html();
  }


  

/*Setup Account*/
  $(document).ready(function(){
      var Setup = $("#setup-user").val();
      if (Setup == 'NO') {
        $("#modal-setup-account").modal("show");
      }else{
        $("#modal-setup-account").modal("hide");
      }
  });
  
  $(document).ready(function() {
      $("#showpass").on("click", function () {
          const input = $("#user-newpassword");
          const type = input.attr("type") === "password" ? "text" : "password";
          input.attr("type", type);
          $(this).toggleClass("bi-eye bi-eye-slash");
      });
  });




</script>


<!-- Modal Setup Account -->
<form id="frm-acc-setup">
  <div class="modal fade" id="modal-setup-account" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="mt-2 mb-3 text-center">
            <h1 class="display-8 fs-5">Account Setup</h1>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="user-fullname" id="user-fullname" class="form-control" required>
            <label for="user-fullname">Fullname</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="user-position" id="user-position" class="form-control" required>
            <label for="user-position">Position</label>
          </div>
          <div class="form-floating mb-3 position-relative">
            <input type="password" name="user-newpassword" id="user-newpassword" class="form-control"  required>
            <label for="user-newpassword">Password</label>
            <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3" 
               id="showpass" style="cursor: pointer;"></i>
          </div>
          <div class="d-grid mb-3">
            <button type="submit" class="btn btn-success py-2">Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  $("#frm-acc-setup").submit(function(event){
    event.preventDefault();
      var Fullname  = $("#user-fullname").val();
      var Position  = $("#user-position").val();
      var Password  = $("#user-newpassword").val();

      $.post("actions/update_setup.php", {
          Fullname  : Fullname,
          Position  : Position,
          Password  : Password
      }, function(data){
          if($.trim(data) == "success"){
            $("#modal-setup-account").modal('hide');
          }else{
              alert("Error: " + data);
          }
      });
  })
</script>



<!-- Modal Login Form Cashier -->
<form id="frm-login-cashier">
  <div class="modal fade"  id="modal-login-cashier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title fw-semibold">
          Cashier Login
        </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger text-center d-none" id="cashier-alert-message" role="alert">
            Invalid Account
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="cashier-username" id="cashier-username" class="form-control" autocomplete="off" required>
            <label for="cashier-username">Username</label>
          </div>
          <div class="form-floating mb-3 position-relative">
            <input type="password" name="cashier-password" id="cashier-password" class="form-control pe-5"  required>
            <label for="cashier-password">Password</label>
            <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3" 
               id="cashier-showpass" style="cursor: pointer;"></i>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="rememberCashier">
            <label class="form-check-label small text-muted">
              Remember this device
            </label>
          </div>
          <div class="d-grid">
            <button type="submit"
                    class="btn btn-primary btn-lg rounded-3">
              <i class="bi bi-box-arrow-in-right me-2"></i>
              Login
            </button>
          </div>
          <div class="text-center mt-3">
            <small class="text-muted">
              POS Access • Cashier Level
            </small>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>



<script>
  /*Script form login for cashier*/
  $("#frm-login-cashier").on("submit", function (event) {
     event.preventDefault();
     var $frm = $(this);
     var Username = $frm.find("input[name='cashier-username']").val().trim();
     var Password = $frm.find("input[name='cashier-password']").val().trim();
     $.post("actions/login_cashier.php", { 
       Username: Username, 
       Password: Password 
     }, function (data) {
       var response = JSON.parse(data);
       if (response.response === "OK") {
        $("#cashier-alert-message").addClass("d-none").text(response.message || "Invalid Account");
         $frm[0].reset();
         if ($("#save-login").is(":checked")) {
           setCookie("Username", Username, 7);
           setCookie("Password", Password, 7);
         }
         $("#modal-login-cashier").modal("hide");

         var role = parseInt(response.role);
         if (role === 1) {
           window.location.assign("cashier/index.php");
         } else {
           window.location.assign("portal.php");
         }
       } else {
         $("#cashier-alert-message").removeClass("d-none").text(response.message || "Invalid Account");
       }
     });
  });


 $("#cashier-showpass").on("click", function () {
     const $input = $("#cashier-password");
     const $icon  = $(this);

     if ($input.attr("type") === "password") {
         $input.attr("type", "text");
         $icon.removeClass("bi-eye-slash").addClass("bi-eye");
     } else {
         $input.attr("type", "password");
         $icon.removeClass("bi-eye").addClass("bi-eye-slash");
     }
 });
</script>


<!-- Modal Login Form Super Admin -->
<form id="frm-login-admin">
  <div class="modal fade"  id="modal-login-admin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title fw-semibold">
          <i class="bi bi-shield-lock-fill  me-2 text-danger"></i>
          Admin Login
        </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" name="admin-username" id="admin-username" class="form-control" autocomplete="off" required>
            <label for="admin-username">Username</label>
          </div>
          <div class="form-floating mb-3 position-relative">
            <input type="password" name="admin-newpassword" id="admin-newpassword" class="form-control pe-5"  required>
            <label for="admin-newpassword">Password</label>
            <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3" 
               id="admin-showpass" style="cursor: pointer;"></i>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="rememberadmin">
            <label class="form-check-label small text-muted">
              Remember this device
            </label>
          </div>
          <div class="d-grid">
            <button type="submit"
                    class="btn btn-danger btn-lg rounded-3">
              <i class="bi bi-box-arrow-in-right me-2"></i>
              Login
            </button>
          </div>
          <div class="text-center mt-3">
            <small class="text-muted">
              POS Access • Cashier Level
            </small>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>



<script>
 $("#admin-showpass").on("click", function () {
     const $input = $("#admin-newpassword");
     const $icon  = $(this);

     if ($input.attr("type") === "password") {
         $input.attr("type", "text");
         $icon.removeClass("bi-eye-slash").addClass("bi-eye");
     } else {
         $input.attr("type", "password");
         $icon.removeClass("bi-eye").addClass("bi-eye-slash");
     }
 });
</script>


<!-- Modal Login Form Super Admin -->
<form id="frm-login-backoffice">
  <div class="modal fade"  id="modal-login-backoffice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title fw-semibold">
          <i class="bi bi-building-gear  me-2 text-success"></i>
          Back Office Login
        </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" name="backoffice-username" id="backoffice-username" class="form-control" autocomplete="off" required>
            <label for="backoffice-username">Username</label>
          </div>
          <div class="form-floating mb-3 position-relative">
            <input type="password" name="backoffice-newpassword" id="backoffice-newpassword" class="form-control pe-5"  required>
            <label for="backoffice-newpassword">Password</label>
            <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3" 
               id="backoffice-showpass" style="cursor: pointer;"></i>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="rememberadmin">
            <label class="form-check-label small text-muted">
              Remember this device
            </label>
          </div>
          <div class="d-grid">
            <button type="submit"
                    class="btn btn-success btn-lg rounded-3">
              <i class="bi bi-box-arrow-in-right me-2"></i>
              Login
            </button>
          </div>
          <div class="text-center mt-3">
            <small class="text-muted">
              POS Access • Cashier Level
            </small>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>



<script>
 $("#backoffice-showpass").on("click", function () {
     const $input = $("#backoffice-newpassword");
     const $icon  = $(this);

     if ($input.attr("type") === "password") {
         $input.attr("type", "text");
         $icon.removeClass("bi-eye-slash").addClass("bi-eye");
     } else {
         $input.attr("type", "password");
         $icon.removeClass("bi-eye").addClass("bi-eye-slash");
     }
 });
</script>
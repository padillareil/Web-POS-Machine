 $(document).ready(function () {
   $("#togglePassword").on("click", function () {
     const input = $("#Password");
     const type = input.attr("type") === "password" ? "text" : "password";
     input.attr("type", type);
     $(this).toggleClass("bi-eye bi-eye-slash");
   });

   if (getCookie("Username") && getCookie("Password")) {
     $("#Username").val(getCookie("Username"));
     $("#Password").val(getCookie("Password"));
     $("#save-login").prop("checked", true);
   }

   $("#save-login").on("change", function () {
     if (this.checked) {
       setCookie("Username", $("#Username").val(), 7);
       setCookie("Password", $("#Password").val(), 7);
     } else {
       deleteCookie("Username");
       deleteCookie("Password");
     }
   });

   
 });

 function setCookie(name, value, days) {
   const date = new Date();
   date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
   document.cookie = name + "=" + encodeURIComponent(value) + "; expires=" + date.toUTCString() + "; path=/";
 }

 function getCookie(name) {
   const value = `; ${document.cookie}`;
   const parts = value.split(`; ${name}=`);
   if (parts.length === 2) return decodeURIComponent(parts.pop().split(";").shift());
 }

 function deleteCookie(name) {
   document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
 }


/*Function to show login form cashier*/
 function loginCashier() {
   const modal = new bootstrap.Modal(
     document.getElementById('modal-login-cashier')
   );
   modal.show();
 }


 /*Function to show login form admin*/
  function loginAdmin() {
    const modal = new bootstrap.Modal(
      document.getElementById('modal-login-admin')
    );
    modal.show();
  }

  /*Function to show login form backoffice*/
   function lognBackOffice() {
     const modal = new bootstrap.Modal(
       document.getElementById('modal-login-backoffice')
     );
     modal.show();
   }


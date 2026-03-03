$(document).ready(function(){
    loadItem_Registration();
});



function loadItem_Registration() {
    $.post("dirs/item_registration/components/main.php", {
    }, function (data){
        $("#load_itemRegistration").html(data);
    });
}


/*Function add item registration*/
function mdlItemRegister() {
    $("#mld-item-registration").modal("show");
}
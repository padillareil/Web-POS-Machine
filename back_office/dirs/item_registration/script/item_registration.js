$(document).ready(function(){
    loadItem_Registration();
});



function loadItem_Registration() {
    $.post("dirs/item_registration/components/main.php", {
    }, function (data){
        $("#load_itemRegistration").html(data);
    });
}



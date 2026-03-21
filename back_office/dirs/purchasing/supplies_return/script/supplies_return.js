$(document).ready(function(){
    load_suppliesReturn();
    
});



function load_suppliesReturn() {
    $.post("dirs/purchasing/supplies_return/components/main.php", {
    }, function (data){
        $("#load_Supplies_Return").html(data);
    });
}

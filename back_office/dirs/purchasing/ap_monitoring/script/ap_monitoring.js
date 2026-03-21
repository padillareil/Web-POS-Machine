$(document).ready(function(){
    load_apmonitoring();
    
});



function load_apmonitoring() {
    $.post("dirs/purchasing/ap_monitoring/components/main.php", {
    }, function (data){
        $("#load_AP_Monitoring").html(data);
    });
}

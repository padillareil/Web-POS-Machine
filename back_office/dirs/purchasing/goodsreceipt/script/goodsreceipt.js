$(document).ready(function(){
    loadGoodsReceipt();
    loadBranches();
    loadVendors();
    get_User();
});

function loadGoodsReceipt() {
    $.post("dirs/purchasing/goodsreceipt/components/main.php", {
    }, function (data){
        $("#load_GoodsReceipt").html(data);
    });
}



/*Function load all branches record*/
function loadBranches(){
    $.post("dirs/purchasing/goodsreceipt/actions/get_branch.php",{},function(data){
        let response = JSON.parse(data);
        if($.trim(response.isSuccess) == "success"){
            let branch = response.Data;
            $("#branches").html('<option value="">Select Branch</option>');
            $.each(branch,function(index,row){
                $("#branches").append(
                    '<option value="'+row.SysNum+'">'+row.BranchName+'</option>'
                );
            });
        }else{
            alert($.trim(response.Data));
        }
    });
}


/*Function load all vendors record*/
function loadVendors(){
    $.post("dirs/purchasing/goodsreceipt/actions/get_vendors.php",{},function(data){
        let response = JSON.parse(data);
        if($.trim(response.isSuccess) == "success"){
            let vendors = response.Data;
            $("#vendors").html('<option value="">Select Vendor</option>');
            $.each(vendors,function(index,row){
                $("#vendors").append(
                    '<option value="'+row.SysNum+'">'+row.VendorName+'</option>'
                );
            });
        }else{
            alert($.trim(response.Data));
        }
    });
}


/*Function to get fullname of the session user*/
function get_User(){
    $.post("dirs/purchasing/goodsreceipt/actions/get_user.php",{
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#received_by").val(response.Data.Fullname);
        }else{
            alert(jQuery.trim(response.Data));
        }
    });
}



$(document).ready(function(){
    loadPurchase_Orders();
    load_VendorCode();
    load_PONUmber();
    loadVendors();
    loadBranches();
});

function loadPurchase_Orders() {
    $.post("dirs/purchasing/purchase_order/components/main.php", {
    }, function (data){
        $("#load_Purchase_Orders").html(data);
    });
}


function mdlAdd_Branch(argument) {
    $("#mdl-add-branch").modal('show');
}


function mdladdSupplier() {
    $("#mdl-add-supplier").modal('show');
}


/*Function Genereate Vendor Code*/
function load_VendorCode(){
    $.post("dirs/purchasing/purchase_order/actions/get_vendor_code.php",{
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#vendor_code").val(response.Data[0].VendorCode);
        }else{
            alert(jQuery.trim(response.Data));
        }
    });
}


/*Function Genereate Purchase Order Number*/
function load_PONUmber(){
    $.post("dirs/purchasing/purchase_order/actions/get_purchaseorder_num.php",{
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#purchase_order_num").val(response.Data[0].PurchaseOrderNum);
        }else{
            alert(jQuery.trim(response.Data));
        }
    });
}


/*Function load all vendors record*/
function loadVendors(){
    $.post("dirs/purchasing/purchase_order/actions/get_vendors.php",{},function(data){
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

/*Function load all branches record*/
function loadBranches(){
    $.post("dirs/purchasing/purchase_order/actions/get_branch.php",{},function(data){
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


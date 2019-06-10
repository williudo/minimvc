$(document).ready(function(){
    $("#valor").mask("#.##0,00", {reverse: true});
    if(typeof toastr_msg !== 'undefined'){
        if(toastr_type == 'success'){
            toastr.success(toastr_msg);
        }else if(toastr_type == 'error'){
            toastr.error(toastr_msg);
        }
    }
})
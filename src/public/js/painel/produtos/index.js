$(document).ready(function () {
    $('.tabela-produtos').DataTable({
        "language": {
            "url": "/public/js/ptbr_datatables.json"
        }
    });

    $('.excluir-produto').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $.ajax({
            url: 'produtos/excluir',
            dataType: 'json',
            data: {
                "produto": $(this).data('id-produto')
            },
            success: function (e) {
                console.log(e, e.toastr);
                if(typeof e.toastr !== 'undefined'){
                    toastr[e.toastr.type](e.toastr.msg);
                    setTimeout('window.location.reload()', 3000)
                   ;
                }
            },

        });
    });
});

$(document).ready(function() {

    $('#grid_Cargos').DataTable({
        "ajax": {
            "url": "../../index.php/ccargo/ajaxBuscarCargos/",
            "type": "POST",
            "dataSrc": "dados"
        },
    	"paging":     true,
        "ordering":   true,
        "responsive": true,
        "info":       true
    });
} );
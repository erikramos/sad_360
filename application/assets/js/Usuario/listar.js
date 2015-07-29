
$(document).ready(function() {

    $('#grid_Usuarios').DataTable({
        "ajax": {
            "url": "../../index.php/cusuario/ajaxBuscarUsuarios/",
            "type": "POST",
            "dataSrc": "dados"
        },
        "paging":     true,
        "ordering":   true,
        "responsive": true,
        "info":       true
    });
} );
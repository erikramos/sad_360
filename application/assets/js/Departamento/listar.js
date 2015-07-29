
$(document).ready(function() {

    $('#grid_Departamentos').DataTable({
        "ajax": {
            "url": "../../index.php/cdepartamento/ajaxBuscarDepartamentos/",
            "type": "POST",
            "dataSrc": "dados"
        },
        "paging":     true,
        "ordering":   true,
        "responsive": true,
        "info":       true
    });
} );
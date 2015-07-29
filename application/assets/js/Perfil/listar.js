
$(document).ready(function() {

    $('#grid_Perfis').DataTable({
        "ajax": {
            "url": "../../index.php/cperfil/ajaxBuscarPerfis/",
            "type": "POST",
            "dataSrc": "dados"
        },
        "paging":     true,
        "ordering":   true,
        "responsive": true,
        "info":       true
    });
} );
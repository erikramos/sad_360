
$(document).ready(function() {

    $('#grid_Avaliacoes').DataTable({
        "ajax": {
            "url": "../../index.php/cavaliacao/ajaxBuscarAvaliacoes/",
            "type": "POST",
            "dataSrc": "dados"
        },
        "paging":     true,
        "ordering":   true,
        "responsive": true,
        "info":       true
    });
} );
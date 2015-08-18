
$(document).ready(function() {

    $('#grid_painel').DataTable({
        "ajax": {
            "url": base_url + "index.php/cavaliacao/ajaxBuscarAvaliacoesPainel/",
            "type": "POST",
            "dataSrc": "dados"
        },
        "paging":     true,
        "ordering":   true,
        "responsive": true,
        "info":       true
    });
} );
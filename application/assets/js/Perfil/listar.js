
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
        "info":       true,
        "oLanguage": {
            "sProcessing": "Carregando ...",
            "sLengthMenu": "Mostrar _MENU_ registros por pagina",
            "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
            "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
            "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
            "sInfoFiltered": "",
            "sSearch": "Procurar",
            "oPaginate": {
               "sFirst":    "Primeiro",
               "sPrevious": "Anterior",
               "sNext":     "Proximo",
               "sLast":     "Ultimo"
            }
        }
    });
} );
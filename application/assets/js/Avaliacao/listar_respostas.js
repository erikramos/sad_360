
$(document).ready(function() {

    $('#grid_Avaliacoes_Respostas').DataTable({
        "ajax": {
            "url": base_url + "index.php/cavaliacao/ajaxBuscarAvaliacoesQuestoesRespostas/",
            "type": "POST",
            "dataSrc": "dados",
            "data" : {
                'aq_id' : $('#aq_id').val()
            }
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
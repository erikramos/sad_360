
<div class="row">
    <a href=<?php echo base_url("index.php/cavaliacao/manter_resposta/".$aq_id) ?> class="btn btn-xs btn-info"><span class="glyphicon glyphicon-plus"></span> Inserir</a>
</div>
<div class="row">
    <input type="hidden" name="aq_id" id="aq_id" value=<?php echo "\"".$aq_id."\""; ?>>
</div>
<div class="row">
    &nbsp;
</div>

<table id="grid_Avaliacoes_Respostas" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Resposta</th>
            <th><center>Op&ccedil;&otilde;es</center></th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>Id</th>
            <th>Resposta</th>
            <th><center>Op&ccedil;&otilde;es</center></th>
        </tr>
    </tfoot>
</table>

<div class="row">
    <a href=<?php echo base_url("index.php/cavaliacao/manter_questao/".$av_id) ?> class="btn btn-xs btn-info"><span class="glyphicon glyphicon-plus"></span> Inserir</a>
</div>
<div class="row">
    <input type="hidden" name="av_id" id="av_id" value=<?php echo "\"".$av_id."\""; ?>>
</div>

<table id="grid_Avaliacoes_Questoes" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Quest&atilde;es</th>
            <th><center>Op&ccedil;&otilde;es</center></th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>Id</th>
            <th>Quest&atilde;es</th>
            <th><center>Op&ccedil;&otilde;es</center></th>
        </tr>
    </tfoot>
</table>
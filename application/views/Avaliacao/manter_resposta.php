
<?php

	if(!isset($dados_resposta)){
		$aq = array();
		$aq['aq_id'] = $aq_id;
		$aq['aqr_id'] = "";
		$aq['aqr_resposta'] = "";
		$aq['aqr_data_cadastro'] = "";
	}else{
		$aq = array();
		$aq['aq_id'] = $aq_id;
		$aq['aqr_id'] = $dados_resposta[0]->aqr_id;
		$aq['aqr_resposta'] = $dados_resposta[0]->aqr_resposta;
		$aq['aqr_data_cadastro'] = $dados_resposta[0]->aqr_data_cadastro;
	}


	if($this->session->flashdata('erro')){

		echo '<div class="alert alert-warning alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Aviso: </strong> '.$this->session->flashdata('erro').'
			</div>';
	}
?>

<form class="form-horizontal" action=<?php echo base_url("index.php/cavaliacao/salvar_resposta") ?> method="post">
	<fieldset>

		<!-- Form Name -->
		<legend>Resposta</legend>

		<!-- Text input-->
		<div class="control-group">
			<label class="control-label" for="av_titulo">Resposta</label>
			<div class="controls">
				<input id="aqr_resposta" name="aqr_resposta" value=<?php echo "\"".$aq['aqr_resposta']."\""; ?> type="text" placeholder="Titulo" size="50">
				<input type="hidden" name="aq_id" id="aq_id" value=<?php echo "\"".$aq['aq_id']."\""; ?>>
				<input type="hidden" name="aqr_id" id="aqr_id" value=<?php echo "\"".$aq['aqr_id']."\""; ?>>
			</div>
		</div>

		<!-- Button (Double) -->
		<div class="control-group">
			<label class="control-label" for="salvar"></label>
			<div class="controls">
				<button id="salvar" name="salvar" class="btn btn-info">Salvar</button>
				<button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
			</div>
		</div>

	</fieldset>
</form>

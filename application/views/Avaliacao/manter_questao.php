
<?php

	if(!isset($dados_questao)){
		$aq = array();
		$aq['av_id'] = $av_id;
		$aq['aq_id'] = "";
		$aq['aq_questao'] = "";
		$aq['aq_data_cadastro'] = "";
	}else{
		$aq = array();
		$aq['av_id'] = $av_id;
		$aq['aq_id'] = $dados_questao[0]->aq_id;
		$aq['aq_questao'] = $dados_questao[0]->aq_questao;
		$aq['aq_data_cadastro'] = $dados_questao[0]->aq_data_cadastro;
	}


	if($this->session->flashdata('erro')){

		echo '<div class="alert alert-warning alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Aviso: </strong> '.$this->session->flashdata('erro').'
			</div>';
	}
?>

<form class="form-horizontal" action=<?php echo base_url("index.php/cavaliacao/salvar_questao") ?> method="post">
	<fieldset>

		<!-- Form Name -->
		<legend>Quest&atilde;o</legend>

		<!-- Text input-->
		<div class="control-group">
			<label class="control-label" for="av_titulo">Quest&atilde;o</label>
			<div class="controls">
				<input id="aq_questao" name="aq_questao" value=<?php echo "\"".$aq['aq_questao']."\""; ?> type="text" placeholder="Titulo" size="50">
				<input type="hidden" name="av_id" id="av_id" value=<?php echo "\"".$aq['av_id']."\""; ?>>
				<input type="hidden" name="aq_id" id="aq_id" value=<?php echo "\"".$aq['aq_id']."\""; ?>>
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

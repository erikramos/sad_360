
<?php
	if(!isset($dados)){
		$per = array();
		$per['pe_id'] = "";
		$per['pe_descricao'] = "";
	}else{
		$per = array();
		$per['pe_id'] = $dados[0]->pe_id;
		$per['pe_descricao'] = $dados[0]->pe_descricao;
	}

	if($this->session->flashdata('erro')){

		echo '<div class="alert alert-warning alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Aviso: </strong> '.$this->session->flashdata('erro').'
			</div>';
	}
?>

<form class="form-horizontal" action=<?php echo base_url("index.php/cperfil/salvar") ?> method="post">
	<fieldset>

		<!-- Form Name -->
		<legend>Perfil</legend>

		<!-- Text input-->
		<div class="control-group">
			<label class="control-label" for="pe_descricao">Perfil</label>
			<div class="controls">
				<input id="pe_descricao" name="pe_descricao" value=<?php echo "\"".$per['pe_descricao']."\""; ?> type="text" placeholder="Nome do perfil" size="50">
				<input type="hidden" name="pe_id" id="pe_id" value=<?php echo "\"".$per['pe_id']."\""; ?>>
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

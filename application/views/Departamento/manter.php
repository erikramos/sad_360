
<?php
	if(!isset($dados)){
		$dept = array();
		$dept['de_id'] = "";
		$dept['de_nome'] = "";
	}else{
		$dept = array();
		$dept['de_id'] = $dados[0]->de_id;
		$dept['de_nome'] = $dados[0]->de_nome;
	}

	if($this->session->flashdata('erro')){

		echo '<div class="alert alert-warning alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Aviso: </strong> '.$this->session->flashdata('erro').'
			</div>';
	}
?>

<form id="formCargo" class="form-horizontal" action=<?php echo base_url("index.php/cdepartamento/salvar") ?> method="post">
	<fieldset>

		<!-- Form Name -->
		<legend>Departamento</legend>

		<!-- Text input-->
		<div class="control-group">
			<label class="control-label" for="de_nome">Departamento</label>
			<div class="controls">
				<input id="de_nome" name="de_nome" value=<?php echo "\"".$dept['de_nome']."\""; ?> type="text" placeholder="Nome departamento" size="50">
				<input type="hidden" name="de_id" id="de_id" value=<?php echo "\"".$dept['de_id']."\""; ?>>
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

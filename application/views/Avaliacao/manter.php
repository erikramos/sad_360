
<?php
	if(!isset($dados)){
		$us = array();
		$us['us_id'] = "";
		$us['us_nome'] = "";
		$us['us_login'] = "";
		$us['us_senha'] = "";
		$us['ca_id'] = "";
		$us['de_id'] = "";
		$us['pe_id'] = "";
	}else{
		$us = array();
		$us['us_id'] = $dados[0]->us_id;
		$us['us_nome'] = $dados[0]->us_nome;
		$us['us_login'] = $dados[0]->us_login;
		$us['us_senha'] = $dados[0]->us_senha;
		$us['ca_id'] = $dados[0]->ca_id;
		$us['de_id'] = $dados[0]->de_id;
		$us['pe_id'] = $dados[0]->pe_id;
	}

	if($this->session->flashdata('erro')){

		echo '<div class="alert alert-warning alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Aviso: </strong> '.$this->session->flashdata('erro').'
			</div>';
	}
?>

<form class="form-horizontal" action=<?php echo base_url("index.php/cusuario/salvar") ?> method="post">
	<fieldset>

		<!-- Form Name -->
		<legend>Usuario</legend>

		<!-- Text input-->
		<div class="control-group">
			<label class="control-label" for="us_nome">Nome</label>
			<div class="controls">
				<input id="us_nome" name="us_nome" value=<?php echo "\"".$us['us_nome']."\""; ?> type="text" placeholder="Nome do usuario" size="50">
				<input type="hidden" name="us_id" id="us_id" value=<?php echo "\"".$us['us_id']."\""; ?>>
			</div>
		</div>

		<!-- Text input-->
		<div class="control-group">
			<label class="control-label" for="us_login">Login</label>
			<div class="controls">
				<input id="us_login" name="us_login" value=<?php echo "\"".$us['us_login']."\""; ?> type="text" placeholder="Login do usuario" size="30">
			</div>
		</div>

		<!-- Text input-->
		<div class="control-group">
			<label class="control-label" for="us_senha">Senha</label>
			<div class="controls">
				<input type="password" id="us_senha" name="us_senha" value=<?php echo "\"".$us['us_senha']."\""; ?> type="text" placeholder="Senha do usuario" size="30">
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

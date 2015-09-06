

<form class="form-horizontal container-fluid" method="post" action="<?php echo base_url("index.php/clogin/logar") ?>" id="form_login">
	<?php
		if($this->session->flashdata('erro')){
			echo '<div class="alert alert-warning alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Aviso: </strong> '.$this->session->flashdata('erro').'
				</div>';
		}
	?>
	<div class="control-group">
		<label class="control-label" for="login">Login</label>
		<div class="controls">
			<input name="login" id="login" type="text" placeholder="Digite o seu login..." />
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="senha">Senha</label>
		<div class="controls">
			<input id="senha" name="senha" type="password" placeholder="Digite a sua senha..." />
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="senha">&nbsp;</label>
		<div class="controls">
			<button class="btn" type="submit">Acessar</button>
		</div>
	</div>
</form>
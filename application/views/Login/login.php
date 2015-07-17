
<form class="form-horizontal container-fluid" action="<?php echo base_url("index.php/clogin/logar") ?>" id="form_login">
	<div class="control-group">
		<label class="control-label" for="inputLogin">Login</label>
		<div class="controls">
			<input id="inputLogin" type="text" placeholder="Digite o seu login..." />
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputSenha">Senha</label>
		<div class="controls">
			<input id="inputSenha" type="password" placeholder="Digite a sua senha..." />
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
		<label class="checkbox"><input type="checkbox" /> Lembrar senha</label>
			<button class="btn" type="submit">Acessar</button>
		</div>
	</div>
</form>
<form class="form-horizontal" action=<?php echo base_url("index.php/ccargo/salvar") ?> method="post">
	<fieldset>

		<!-- Form Name -->
		<legend>Cargo</legend>

		<!-- Text input-->
		<div class="control-group">
			<label class="control-label" for="ca_descricao">Descri&ccedil;&atilde;o</label>
			<div class="controls">
				<input id="ca_descricao" name="ca_descricao" type="text" placeholder="Nome do cargo" size="50">
			</div>
		</div>

		<!-- Textarea -->
		<div class="control-group">
			<label class="control-label" for="ca_atribuicoes">Atribui&ccedil;&otilde;es</label>
			<div class="controls">
				<input id="ca_atribuicoes" name="ca_atribuicoes" type="text" placeholder="fun&ccedil;&otilde;es desempenhadas..." size="50">
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

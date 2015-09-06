
<form class="form-horizontal" action=<?php echo base_url("index.php/cavaliacao/salvar_avaliacao_respondida") ?> method="post">
	<fieldset>

		<!-- Form Name -->
		<legend><?php echo $dados['avaliacao'][0]->av_titulo ?></legend>

		<?php
			foreach ($dados['questoes'] as $key => $value) {
				?>

				<!-- Text input-->
				<div class="control-group">
					<label class="control-label"><?php echo $value->aq_questao; ?></label>

					<?php
					foreach ($dados['respostas'] as $r => $resp) {

						foreach ($resp as $chave => $valor) {

							//die(var_dump($valor));
							if($valor->aq_id == $value->aq_id){
								?>
									<div class="radio">
								        <label for="radios-<? echo $value->aq_id; ?>">
								        <input type="radio" name="radios<? echo $value->aq_id; ?>" id="radios-<? echo $value->aq_id; ?>" value="<? echo $value->aq_id; ?>" checked="checked">
								        	<? echo $valor->aqr_resposta; ?>
								        </label>
							        </div>
								<?php
							}
						}
					}
					?>

				</div>

				<?php
			}
		?>

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

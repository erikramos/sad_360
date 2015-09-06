
<?php
	if(!isset($dados)){
		$av = array();
		$av['av_id'] = "";
		$av['av_titulo'] = "";
		$av['av_descricao'] = "";
	}else{
		$av = array();
		$av['av_id'] = $dados[0]->av_id;
		$av['av_titulo'] = $dados[0]->av_titulo;
		$av['av_descricao'] = $dados[0]->av_descricao;
	}

	if($this->session->flashdata('erro')){

		echo '<div class="alert alert-warning alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Aviso: </strong> '.$this->session->flashdata('erro').'
			</div>';
	}
?>

<form class="form-horizontal" action=<?php echo base_url("index.php/cavaliacao/salvar") ?> method="post">
	<fieldset>

		<!-- Form Name -->
		<legend>Avalia&ccedil;&atilde;o</legend>

		<!-- Text input-->
		<div class="control-group">
			<label class="control-label" for="av_titulo">Titulo</label>
			<div class="controls">
				<input id="av_titulo" name="av_titulo" value=<?php echo "\"".$av['av_titulo']."\""; ?> type="text" placeholder="Titulo" size="30">
				<input type="hidden" name="av_id" id="av_id" value=<?php echo "\"".$av['av_id']."\""; ?>>
			</div>
		</div>

		<!-- Text input-->
		<div class="control-group">
			<label class="control-label" for="av_descricao">Descri&ccedil;&atilde;o</label>
			<div class="controls">
				<input id="av_descricao" name="av_descricao" value=<?php echo "\"".$av['av_descricao']."\""; ?> type="text" placeholder="Descri&ccedil;&atilde;o" size="80">
			</div>
		</div>

		<!-- select-->
		<div class="control-group">
			<label class="control-label" for="participantes">Participantes</label>
			<div class="controls">
				<?php echo form_dropdown('participantes[]', $usuarios, '', 'size=10 multiple="multiple"'); ?>
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN""http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
	<head>
		<title>{title_for_layout}</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		{css_for_layout}

		<!-- Bootstrap -->
    	<link href=<?php echo base_url("application/assets/libs/css/BootStrap_3.3.0/css/bootstrap.min.css") ?> rel="stylesheet">

		<!-- DataTables -->
    	<link href=<?php echo base_url("application/assets/libs/css/DataTables/jquery.dataTables.css") ?> rel="stylesheet">
    	<link href=<?php echo base_url("application/assets/libs/css/DataTables/responsive.dataTables.css") ?> rel="stylesheet">
	</head>

	<body>
		<div id="conteudo_geral" class="container">

			<div id="conteudo_topo" class="row">
				<?php
					include("menu_superior.php");
				?>
			</div>

			<div id="conteudo_central" class="row">
				{content_for_layout}
			</div>
		</div>

		<!--carrega os arquivos de script depois que ja carregou a pagina por
		questoes de performance e para garantir que todos os elementos usados
		nos scripts ja estejam carregados-->

		<!-- jQuery -->
	    <script type="text/javascript" src=<?php echo base_url("application/assets/libs/js/jquery_2_1_1.js") ?> ></script>
	    <!-- javascript bootstrap -->
	    <script type="text/javascript" src=<?php echo base_url("application/assets/libs/css/BootStrap_3.3.0/js/bootstrap.min.js") ?> ></script>
	    <!-- DataTables -->
	    <script type="text/javascript" src=<?php echo base_url("application/assets/libs/js/DataTables/jquery.dataTables.js") ?> ></script>
	    <script type="text/javascript" src=<?php echo base_url("application/assets/libs/js/DataTables/responsive.dataTables.js") ?> ></script>

	    <!-- criando variavel pra receber caminho padrao url no javascript -->
	    <script type="text/javascript">
	    	var base_url = <?php echo "\"".base_url()."\""; ?>
	    </script>

		{js_for_layout}
	</body>
</html>
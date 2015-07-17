<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN""http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
	<head>
		<title>{title_for_layout}</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap -->
    	<link href=<?php echo base_url("application/assets/libs/css/BootStrap_3.3.0/css/bootstrap.min.css") ?> rel="stylesheet">

    	{css_for_layout}
	</head>

	<body>
		<div id="geral" class="container-fluid">

			<div class="row">
				<div class="navbar navbar-inverse navbar-fixed-top" id="menu_superior_login">
					<div class="navbar-header">
				      <a class="navbar-brand" href="#">SAD-360</a>
				    </div>
				</div>
			</div>

			<div id="meio" class="container-fluid row">
				{content_for_layout}
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script type="text/javascript" src=<?php echo base_url("application/assets/libs/js/jquery_2_1_1.js") ?> ></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script type="text/javascript" src=<?php echo base_url("application/assets/libs/css/BootStrap_3.3.0/js/bootstrap.min.js") ?> ></script>

	    <!--carrega os arquivos de script depois que ja carregou a pagina por
		questoes de performance e para garantir que todos os elementos usados
		nos scripts ja estejam carregados-->
		{js_for_layout}
	</body>
</html>
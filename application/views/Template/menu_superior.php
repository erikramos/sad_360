<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SAD-360</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(strpos(uri_string(), "cpainel") !== false) echo 'class="active"'; ?> ><a href=<?php echo base_url("index.php/cpainel/") ?> >Painel</a></li>
        <li <?php if(strpos(uri_string(), "crelatorio") !== false) echo 'class="active"'; ?> ><a href=<?php echo base_url("index.php/crelatorio/listar") ?> >Relat&oacute;rio</a></li>

        <li <?php if((strpos(uri_string(), "cavaliacao") !== false) ||
                    (strpos(uri_string(), "cusuario") !== false) ||
                    (strpos(uri_string(), "ccargo") !== false) ||
                    (strpos(uri_string(), "cperfil") !== false)) echo 'class="active"'; ?> class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastros <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li <?php if(strpos(uri_string(), "cavaliacao") !== false) echo 'class="active"'; ?> ><a href=<?php echo base_url("index.php/cavaliacao/listar") ?> >Avalia&ccedil;&otilde;es</a></li>
            <li class="divider"></li>
            <li <?php if(strpos(uri_string(), "cusuario") !== false) echo 'class="active"'; ?> ><a href=<?php echo base_url("index.php/cusuario/listar") ?> >Usu&aacute;rios</a></li>
            <li <?php if(strpos(uri_string(), "ccargo") !== false) echo 'class="active"'; ?> ><a href=<?php echo base_url("index.php/ccargo/listar") ?> >Cargos</a></li>
            <li <?php if(strpos(uri_string(), "cperfil") !== false) echo 'class="active"'; ?> ><a href=<?php echo base_url("index.php/cperfil/listar") ?> >Perfis</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Nome da avalia&ccedil;&atilde;o">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Op&ccedil;&otilde;es<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Meus dados</a></li>
            <li class="divider"></li>
            <li><a href=<?php echo base_url("index.php/clogin/sair") ?> >Sair</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("cbase.php");

class CRelatorio extends cbase {

	// Layout default utilizado pelo controlador.
	public $layout = 'default';

	//Titulo default.
	public $title = '';

	//Definindo os css default.
	public $css = array('template');

	//Carregando os js default.
	public $js = array('template');

	//metodo construtor do controller
	public function __construct()
   	{
    	parent::__construct();
    	//$this->load->model('Perfil');
   	}

   	function index(){
   		$this->listar();
   	}

	function listar(){

		$this->layout = 'default';					//informa qual template utilizar para carregar a view dentro
		$this->title = '::: SAD-360 :::';			//informa o titulo da pagina
		$this->css = array('Template/template');	//informa o arquivo css a ser carregado com layout da pagina
		$this->js = array('Relatorio/listar');			//informa o arquivo js com scripts de execução da pagina
		$this->load->view('Relatorio/listar');			//carrega a view
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("cbase.php");

class CLogin extends cbase {

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
    	$this->load->model('Usuario');
   	}

	function index(){

		$this->layout = 'tela_login';		//informa qual template utilizar para carregar a view dentro
		$this->title = '::: LOGIN :::';	 	//informa o titulo da pagina
		$this->css = array('Login/login');	//informa o arquivo css a ser carregado com layout da pagina
		$this->js = array('Login/login');	//informa o arquivo js com scripts de execução da pagina
		$this->load->view('Login/login');	//carrega a view
	}

	function logar(){

		$dados = $this->input->post();

		$us = new Usuario();
		$usuario = $us->verificaLogin($dados);

		if($usuario !== false){
			$_SESSION['usuario'] = $usuario;
			redirect(base_url("index.php/cpainel/painel"), 'refresh');
		}else{
			$this->session->set_flashdata('erro', 'Login e/ou senha incorretos.');
			redirect(base_url("index.php/clogin/"), 'refresh');
		}
	}

	function sair(){

		if (!isset($_SESSION))
			session_destroy();

		$_SESSION['usuario'] = null;

		//redireciona para a pagina de login
		redirect(base_url("index.php/clogin/"), 'refresh');
	}
}

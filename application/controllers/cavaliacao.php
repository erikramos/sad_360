<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("cbase.php");

class CAvaliacao extends cbase {

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
    	$this->load->model('Avaliacao');
   	}

   	function index(){
   		$this->listar();
   	}

	function listar(){

		$this->layout = 'default';					//informa qual template utilizar para carregar a view dentro
		$this->title = '::: SAD-360 :::';			//informa o titulo da pagina
		$this->css = array('Template/template');	//informa o arquivo css a ser carregado com layout da pagina
		$this->js = array('Avaliacao/listar');			//informa o arquivo js com scripts de execução da pagina
		$this->load->view('Avaliacao/listar');			//carrega a view
	}

	function manter($id=null){

		$dados = array();

		if(!is_null($id)){

			$av = new Avaliacao();
			$dados['dados'] = $av->getById($id);
		}

		$this->layout = 'default';					//informa qual template utilizar para carregar a view dentro
		$this->title = '::: SAD-360 :::';			//informa o titulo da pagina
		$this->css = array('Template/template');	//informa o arquivo css a ser carregado com layout da pagina
		$this->js = array('Avaliacao/manter');			//informa o arquivo js com scripts de execução da pagina
		$this->load->view('Avaliacao/manter',$dados);			//carrega a view
	}

	function ajaxBuscarAvaliacoes(){

		$dados = $this->Avaliacao->gridAvaliacoes();

		echo json_encode($dados);
		die();
   	}

   	function ajaxBuscarAvaliacoesPainel(){

		$this->load->model('Avaliacao');
		$dados = $this->Avaliacao->gridAvaliacoesPainel();

		echo json_encode($dados);
		die();
   	}

   	function salvar (){

		$dados = $this->input->post();

		if($dados['us_nome'] == ""){

			$this->session->set_flashdata('erro', 'Preencha o nome do Usuario.');
			redirect(site_url() . '/cusuario/manter', 'refresh');
		}else if($dados['us_login'] == ""){

			$this->session->set_flashdata('erro', 'Preencha o login do Usuario.');
			redirect(site_url() . '/cusuario/manter', 'refresh');
		}else if($dados['us_senha'] == ""){

			$this->session->set_flashdata('erro', 'Informe a senha do Usuario.');
			redirect(site_url() . '/cusuario/manter', 'refresh');
		}

		if($dados['us_id'] != ""){
			$us = new Usuario();
			$us->alterar($dados);
		}else{
			$us = new Usuario();
			$us->cadastrar($dados);
		}

		redirect(site_url() . '/cusuario/listar', 'refresh');
	}

	function excluir ($id){

		$av = new Avaliacao();
		$av->excluir($id);

		redirect(site_url() . '/cavaliacao/listar', 'refresh');
	}
}

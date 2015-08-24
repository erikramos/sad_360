<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("cbase.php");

class CPerfil extends cbase {

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
    	$this->load->model('Perfil');
   	}

   	function index(){
   		$this->listar();
   	}

	function listar(){

		$this->layout = 'default';					//informa qual template utilizar para carregar a view dentro
		$this->title = '::: SAD-360 :::';			//informa o titulo da pagina
		$this->css = array('Template/template');	//informa o arquivo css a ser carregado com layout da pagina
		$this->js = array('Perfil/listar');			//informa o arquivo js com scripts de execução da pagina
		$this->load->view('Perfil/listar');			//carrega a view
	}

	function ajaxBuscarPerfis(){

		$dados = $this->Perfil->gridPerfis();

		echo json_encode($dados);
		die();
   	}

   	function manter($id=null){

		$dados = array();

		if(!is_null($id)){

			$pe = new Perfil();
			$dados['dados'] = $pe->getById($id);
		}

		$this->layout = 'default';					//informa qual template utilizar para carregar a view dentro
		$this->title = '::: SAD-360 :::';			//informa o titulo da pagina
		$this->css = array('Template/template');	//informa o arquivo css a ser carregado com layout da pagina
		$this->js = array('Perfil/manter');			//informa o arquivo js com scripts de execução da pagina
		$this->load->view('Perfil/manter',$dados);			//carrega a view
	}

	function salvar (){

		$dados = $this->input->post();

		if($dados['pe_descricao'] == ""){

			$this->session->set_flashdata('erro', 'Preencha o nome do Perfil.');
			redirect(site_url() . '/cperfil/manter', 'refresh');
		}

		if($dados['pe_id'] != ""){
			$pe = new Perfil();
			$pe->alterar($dados);
		}else{
			$pe = new Perfil();
			$pe->cadastrar($dados);
		}

		redirect(site_url() . '/cperfil/listar', 'refresh');
	}

	function excluir ($id){

		$pe = new Perfil();
		$pe->excluir($id);

		redirect(site_url() . '/cperfil/listar', 'refresh');
	}
}

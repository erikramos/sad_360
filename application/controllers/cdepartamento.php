<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("cbase.php");

class CDepartamento extends cbase {

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
    	$this->load->model('Departamento');
   	}

   	function index(){
   		$this->listar();
   	}

	function listar(){

		$this->layout = 'default';					//informa qual template utilizar para carregar a view dentro
		$this->title = '::: SAD-360 :::';			//informa o titulo da pagina
		$this->css = array('Template/template');	//informa o arquivo css a ser carregado com layout da pagina
		$this->js = array('Departamento/listar');			//informa o arquivo js com scripts de execução da pagina
		$this->load->view('Departamento/listar');			//carrega a view
	}

	function ajaxBuscarDepartamentos(){

		$dados = $this->Departamento->gridDepartamentos();

		echo json_encode($dados);
		die();
   	}

   	function manter($id=null){

		$dados = array();

		if(!is_null($id)){

			$de = new Departamento();
			$dados['dados'] = $de->getById($id);
		}

		$this->layout = 'default';					//informa qual template utilizar para carregar a view dentro
		$this->title = '::: SAD-360 :::';			//informa o titulo da pagina
		$this->css = array('Template/template');	//informa o arquivo css a ser carregado com layout da pagina
		$this->js = array('Departamento/manter');			//informa o arquivo js com scripts de execução da pagina
		$this->load->view('Departamento/manter',$dados);			//carrega a view
	}

	function salvar (){

		$dados = $this->input->post();

		if($dados['de_nome'] == ""){

			$this->session->set_flashdata('erro', 'Preencha o nome do Departamento.');
			redirect(site_url() . '/cdepartamento/manter', 'refresh');
		}

		if($dados['de_id'] != ""){
			$de = new Departamento();
			$de->alterar($dados);
		}else{
			$de = new Departamento();
			$de->cadastrar($dados);
		}

		redirect(site_url() . '/cdepartamento/listar', 'refresh');
	}

	function excluir ($id){

		$de = new Departamento();
		$de->excluir($id);

		redirect(site_url() . '/cdepartamento/listar', 'refresh');
	}
}

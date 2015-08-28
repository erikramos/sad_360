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

		$dados = $this->Avaliacao->gridAvaliacoesPainel();

		echo json_encode($dados);
		die();
   	}

   	function salvar (){

		$dados = $this->input->post();

		if($dados['av_titulo'] == ""){

			$this->session->set_flashdata('erro', 'Preencha o titulo da Avaliacao.');
			redirect(site_url() . '/cavaliacao/manter', 'refresh');
		}else if($dados['av_descricao'] == ""){

			$this->session->set_flashdata('erro', 'Preencha a descricao da Avaliacao.');
			redirect(site_url() . '/cavaliacao/manter', 'refresh');
		}

		if($dados['av_id'] != ""){
			$av = new Avaliacao();
			$av->alterar($dados);
		}else{
			$av = new Avaliacao();
			$av->cadastrar($dados);
		}

		redirect(site_url() . '/cavaliacao/listar', 'refresh');
	}

	function excluir ($id){

		$av = new Avaliacao();
		$av->excluir($id);

		redirect(site_url() . '/cavaliacao/listar', 'refresh');
	}
}

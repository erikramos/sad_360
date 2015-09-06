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
    	$this->load->model('Avaliacao_Questao');
    	$this->load->model('Avaliacao_Questao_Resposta');
    	$this->load->model('Usuario');
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

		$us = new Usuario();
		$dados['usuarios'] = $us->buscarSelectUsuarios();

		$this->layout = 'default';					//informa qual template utilizar para carregar a view dentro
		$this->title = '::: SAD-360 :::';			//informa o titulo da pagina
		$this->css = array('Template/template');	//informa o arquivo css a ser carregado com layout da pagina
		$this->js = array('Avaliacao/manter');			//informa o arquivo js com scripts de execução da pagina
		$this->load->view('Avaliacao/manter',$dados);			//carrega a view
	}

	function listar_questoes($id){

		$dados = array();

		$dados['av_id'] = $id;

		$this->layout = 'default';					//informa qual template utilizar para carregar a view dentro
		$this->title = '::: SAD-360 :::';			//informa o titulo da pagina
		$this->css = array('Template/template');	//informa o arquivo css a ser carregado com layout da pagina
		$this->js = array('Avaliacao/listar_questoes');			//informa o arquivo js com scripts de execução da pagina
		$this->load->view('Avaliacao/listar_questoes',$dados);			//carrega a view
	}

	function listar_respostas($aq_id){

		$dados = array();

		$dados['aq_id'] = $aq_id;

		$this->layout = 'default';					//informa qual template utilizar para carregar a view dentro
		$this->title = '::: SAD-360 :::';			//informa o titulo da pagina
		$this->css = array('Template/template');	//informa o arquivo css a ser carregado com layout da pagina
		$this->js = array('Avaliacao/listar_respostas');			//informa o arquivo js com scripts de execução da pagina
		$this->load->view('Avaliacao/listar_respostas',$dados);			//carrega a view
	}

	function manter_questao($av_id=null, $id=null){

		//die(var_dump($av_id, $id));

		$dados = array();

		$dados['av_id'] = $av_id;

		if(!is_null($id)){

			$aq = new Avaliacao_Questao();
			$dados['dados_questao'] = $aq->getById($id);
		}

		$this->layout = 'default';					//informa qual template utilizar para carregar a view dentro
		$this->title = '::: SAD-360 :::';			//informa o titulo da pagina
		$this->css = array('Template/template');	//informa o arquivo css a ser carregado com layout da pagina
		$this->js = array('Avaliacao/manter_questao');			//informa o arquivo js com scripts de execução da pagina
		$this->load->view('Avaliacao/manter_questao',$dados);			//carrega a view
	}

	function manter_resposta($aq_id=null, $id=null){

		$dados = array();

		$dados['aq_id'] = $aq_id;

		if(!is_null($id)){

			$aq = new Avaliacao_Questao_Resposta();
			$dados['dados_resposta'] = $aq->getById($id);
		}

		$this->layout = 'default';								//informa qual template utilizar para carregar a view dentro
		$this->title = '::: SAD-360 :::';						//informa o titulo da pagina
		$this->css = array('Template/template');				//informa o arquivo css a ser carregado com layout da pagina
		$this->js = array('Avaliacao/manter_resposta');			//informa o arquivo js com scripts de execução da pagina
		$this->load->view('Avaliacao/manter_resposta',$dados);	//carrega a view
	}

	function responder_avaliacao($av_id=null){

		$dados = array();

		$av = new Avaliacao();
		$dados['dados'] = $av->getPerguntasRespostasAvaliacao($av_id);

		$this->layout = 'default';								//informa qual template utilizar para carregar a view dentro
		$this->title = '::: SAD-360 :::';						//informa o titulo da pagina
		$this->css = array('Template/template');				//informa o arquivo css a ser carregado com layout da pagina
		$this->js = array('Avaliacao/responder_avaliacao');			//informa o arquivo js com scripts de execução da pagina
		$this->load->view('Avaliacao/responder_avaliacao',$dados);	//carrega a view
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

   	function ajaxBuscarAvaliacoesQuestoes(){

		$dados = $this->Avaliacao_Questao->gridQuestoes($this->input->post('av_id'));

		echo json_encode($dados);
		die();
   	}

   	function ajaxBuscarAvaliacoesQuestoesRespostas(){

		$dados = $this->Avaliacao_Questao_Resposta->gridRespostas($this->input->post('aq_id'));

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
		}else if(!isset($dados['participantes'])){

			$this->session->set_flashdata('erro', 'Selecione os participantes.');
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

	function salvar_questao (){

		$dados = $this->input->post();

		if($dados['aq_questao'] == ""){

			$this->session->set_flashdata('erro', 'Preencha a quest&atilde;o da Avaliacao.');
			redirect(site_url() . '/cavaliacao/manter_questao/'.$dados['av_id'].'/'.$dados['aq_id'], 'refresh');
		}

		if($dados['aq_id'] != ""){
			$av = new Avaliacao_Questao();
			$av->alterar($dados);
		}else{
			$av = new Avaliacao_Questao();
			$av->cadastrar($dados);
		}

		redirect(site_url() . '/cavaliacao/listar_questoes/'.$dados['av_id'], 'refresh');
	}

	function salvar_resposta (){

		$dados = $this->input->post();

		if($dados['aqr_resposta'] == ""){

			$this->session->set_flashdata('erro', 'Preencha a resposta da quest&atilde;o.');
			redirect(site_url() . '/cavaliacao/manter_resposta/'.$dados['aq_id'].'/'.$dados['aqr_id'], 'refresh');
		}

		if($dados['aqr_id'] != ""){
			$av = new Avaliacao_Questao_Resposta();
			$av->alterar($dados);
		}else{
			$av = new Avaliacao_Questao_Resposta();
			$av->cadastrar($dados);
		}

		redirect(site_url() . '/cavaliacao/listar_respostas/'.$dados['aq_id'], 'refresh');
	}

	function salvar_avaliacao_respondida(){

		$dados = $this->input->post();

		die(var_dump($dados));
	}

	function excluir ($id){

		$av = new Avaliacao();
		$av->excluir($id);

		redirect(site_url() . '/cavaliacao/listar', 'refresh');
	}

	function excluir_pergunta ($av_id,$id){

		$ar = new Avaliacao_Questao_Resposta();
		$ar->excluirTudo($id);

		$av = new Avaliacao_Questao();
		$av->excluir($id);

		redirect(site_url() . '/cavaliacao/listar_questoes/'.$av_id, 'refresh');
	}

	function excluir_resposta ($aq_id,$id){

		$ar = new Avaliacao_Questao_Resposta();
		$ar->excluirResposta($id);

		redirect(site_url() . '/cavaliacao/listar_respostas/'.$aq_id, 'refresh');
	}
}

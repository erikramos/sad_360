<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avaliacao extends CI_Model {

    var $av_titulo   = '';
    var $av_descricao = '';
    var $av_data_cadastro = '';
    var $av_status = '';

    function __construct()
    {
        parent::__construct();
    }

    function gridAvaliacoes()
    {

        $status = array(
            0=>'<font color="red">Inativa</font>',
            1=>'<font color="green">Ativa</font>',
            2=>'<font color="blue">Finalizada</font>'
        );

        $query = $this->db->get('avaliacao', 1000);
        $ret = $query->result();

        $dados = array();
        $i = 0;

        foreach ($ret as $key => $value) {

            $botoes = '<center><a href='.base_url("index.php/cavaliacao/listar_questoes/".$value->av_id).' title="Cadastrar questoes"><span class="glyphicon glyphicon-plus"></span></a>';
            $botoes .= '&nbsp;&nbsp;&nbsp;<a href='.base_url("index.php/cavaliacao/excluir/".$value->av_id).' title="Alterar status"><span class="glyphicon glyphicon-random"></span></a></center>';

            $dados['dados'][$i][] = $value->av_id;
            $dados['dados'][$i][] = $value->av_titulo;
            $dados['dados'][$i][] = $value->av_descricao;
            $dados['dados'][$i][] = $value->av_data_cadastro;
            $dados['dados'][$i][] = $status[$value->av_status];
            $dados['dados'][$i][] = $botoes;
            $i++;
        }

        return $dados;
    }

    function gridAvaliacoesPainel()
    {

        $status = array(
            0=>'<font color="red">Inativa</font>',
            1=>'<font color="green">Ativa</font>',
            2=>'<font color="blue">Finalizada</font>'
        );

        $this->db->select('*');
        $this->db->from('avaliacao');
        $this->db->join('avaliacao_usuario', 'avaliacao.av_id = avaliacao_usuario.av_id');
        $this->db->where('avaliacao.av_status', '1');
        $this->db->where('avaliacao_usuario.us_id', $_SESSION['usuario'][0]->us_id);
        $query = $this->db->get();
        $ret = $query->result();

        $dados = array();
        $i = 0;

        foreach ($ret as $key => $value) {

            $botoes = '<center><a href='.base_url("index.php/cavaliacao/responder_avaliacao/".$value->av_id).' title="Responder avaliacao"><span class="glyphicon glyphicon-list-alt"></span></a></center>';

            $dados['dados'][$i][] = $value->av_id;
            $dados['dados'][$i][] = $value->av_titulo;
            $dados['dados'][$i][] = $value->av_descricao;
            $dados['dados'][$i][] = $value->av_data_cadastro;
            $dados['dados'][$i][] = $status[$value->av_status];
            $dados['dados'][$i][] = $botoes;
            $i++;
        }

        return $dados;
    }

    function getById($id){

        $this->db->select('*');
        $this->db->from('avaliacao');
        $this->db->where('av_id', $id);
        $query = $this->db->get();
        $ret = $query->result();

        return $ret;
    }

    function getPerguntasRespostasAvaliacao($av_id){

        $this->db->select('*');
        $this->db->from('avaliacao');
        $this->db->where('av_id', $av_id);
        $query = $this->db->get();
        $ret['avaliacao'] = $query->result();

        $this->db->select('*');
        $this->db->from('avaliacao_questao');
        $this->db->where('av_id', $av_id);
        $query = $this->db->get();
        $ret['questoes'] = $query->result();

        foreach ($ret['questoes'] as $key => $value) {

            $this->db->select('*');
            $this->db->from('avaliacao_questao_resposta');
            $this->db->where('aq_id', $value->aq_id);
            $query = $this->db->get();
            $ret['respostas'][] = $query->result();
        }

        return $ret;
    }

    function cadastrar($dados){

        $this->av_titulo   = trim($dados['av_titulo']);
        $this->av_descricao   = trim($dados['av_descricao']);
        $this->av_data_cadastro   = date('Y-m-d H:i:s');
        $this->av_status   = 0;
        $this->us_id   = $_SESSION['usuario'][0]->us_id;

        $this->db->insert('avaliacao', $this);

        $av_id = $this->db->insert_id();

        foreach ($dados['participantes'] as $key => $value) {

            $data['us_id'] = $value;
            $data['av_id'] = $av_id;
            $this->db->insert('avaliacao_usuario', $data);
        }
    }

    function alterar($dados){

        // $this->us_nome   = trim($dados['us_nome']);
        // $this->us_login   = trim($dados['us_login']);
        // $this->us_senha   = md5(trim($dados['us_senha']));
        // $this->ca_id   = trim($dados['ca_id']);
        // $this->de_id   = trim($dados['de_id']);
        // $this->pe_id   = trim($dados['pe_id']);

        // $this->db->update('usuario', $this, array('us_id' => $dados['us_id']));
    }

    function excluir($id){

        $this->db->select('*');
        $this->db->from('avaliacao');
        $this->db->where('av_id', $id);
        $query = $this->db->get();
        $ret = $query->result();

        $this->av_titulo = $ret[0]->av_titulo;
        $this->av_descricao = $ret[0]->av_descricao;
        $this->av_data_cadastro = $ret[0]->av_data_cadastro;

        if($ret[0]->av_status == 1)
            $this->av_status   = 0;
        else
            $this->av_status   = 1;

        $this->db->update('avaliacao', $this, array('av_id' => $id));
    }

}
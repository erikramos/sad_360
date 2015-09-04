<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avaliacao_Questao extends CI_Model {

    var $av_id = '';
    var $aq_id = '';
    var $aq_questao   = '';
    var $aq_data_cadastro = '';

    function __construct()
    {
        parent::__construct();
    }

    function gridQuestoes($av_id){

        $this->db->select('*');
        $this->db->from('avaliacao_questao');
        $this->db->where('av_id', $av_id);
        $query = $this->db->get();
        $ret = $query->result();

        $dados = array();
        $i = 0;

        foreach ($ret as $key => $value) {

            $botoes = '<center><a href='.base_url("index.php/cavaliacao/listar_respostas/".$value->aq_id).' title="Cadastrar respostas"><span class="glyphicon glyphicon-plus"></span></a>';
            $botoes .= '&nbsp;&nbsp;&nbsp;<a href='.base_url("index.php/cavaliacao/excluir_pergunta/".$av_id."/".$value->aq_id).' title="Excluir pergunta"><span class="glyphicon glyphicon-remove"></span></a></center>';

            $dados['dados'][$i][] = $value->aq_id;
            $dados['dados'][$i][] = $value->aq_questao;
            $dados['dados'][$i][] = $botoes;
            $i++;
        }

        return $dados;
    }

    function getById($id){

        $this->db->select('*');
        $this->db->from('avaliacao_questao');
        $this->db->where('aq_id', $id);
        $query = $this->db->get();
        $ret = $query->result();

        return $ret;
    }

    function cadastrar($dados){

        $this->av_id   = trim($dados['av_id']);
        $this->aq_questao   = trim($dados['aq_questao']);
        $this->aq_data_cadastro   = date('Y-m-d H:i:s');

        $this->db->insert('avaliacao_questao', $this);
    }

    function alterar($dados){

        $this->av_id   = trim($dados['av_id']);
        $this->aq_id   = trim($dados['aq_id']);
        $this->aq_questao   = trim($dados['aq_questao']);
        $this->aq_data_cadastro   = date('Y-m-d H:i:s');

        $this->db->update('avaliacao_questao', $this, array('aq_id' => $dados['aq_id']));
    }

    function excluir($id){

        $this->db->where('aq_id', $id);
        $this->db->delete('avaliacao_questao');
    }

}
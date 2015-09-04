<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avaliacao_Questao_Resposta extends CI_Model {

    var $aqr_resposta   = '';
    var $aqr_data_cadastro = '';
    var $aq_id = '';

    function __construct()
    {
        parent::__construct();
    }

    function gridRespostas($aq_id){

        $this->db->select('*');
        $this->db->from('avaliacao_questao_resposta');
        $this->db->where('aq_id', $aq_id);
        $query = $this->db->get();
        $ret = $query->result();

        $dados = array();
        $i = 0;

        foreach ($ret as $key => $value) {

            $botoes = '<center><a href='.base_url("index.php/cavaliacao/excluir_resposta/".$aq_id."/".$value->aqr_id).' title="Excluir resposta"><span class="glyphicon glyphicon-remove"></span></a></center>';

            $dados['dados'][$i][] = $value->aqr_id;
            $dados['dados'][$i][] = $value->aqr_resposta;
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

    function cadastrar($dados){

        $this->aq_id   = trim($dados['aq_id']);
        $this->aqr_resposta   = trim($dados['aqr_resposta']);
        $this->aqr_data_cadastro   = date('Y-m-d H:i:s');

        $this->db->insert('avaliacao_questao_resposta', $this);
    }

    function alterar($dados){

        $this->aq_id   = trim($dados['aq_id']);
        $this->aqr_id   = trim($dados['aqr_id']);
        $this->aqr_resposta   = trim($dados['aqr_resposta']);
        $this->aqr_data_cadastro   = date('Y-m-d H:i:s');

        $this->db->update('avaliacao_questao_resposta', $this, array('aqr_id' => $dados['aqr_id']));
    }

    function excluirTudo($id){

        $this->db->where('aq_id', $id);
        $this->db->delete('avaliacao_questao_resposta');
    }

    function excluirResposta($id){

        $this->db->where('aqr_id', $id);
        $this->db->delete('avaliacao_questao_resposta');
    }

}
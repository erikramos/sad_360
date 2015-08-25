<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Model {

    var $pe_descricao   = '';

    function __construct()
    {
        parent::__construct();
    }

    function gridPerfis()
    {

        $query = $this->db->get('perfil', 100);
        $ret = $query->result();

        $dados = array();
        $i = 0;

        foreach ($ret as $key => $value) {

            $botoes = '<center><a href='.base_url("index.php/cperfil/manter/".$value->pe_id).' title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>';
            $botoes .= '&nbsp;&nbsp;&nbsp;<a href='.base_url("index.php/cperfil/excluir/".$value->pe_id).' title="Excluir"><span class="glyphicon glyphicon-remove"></span></a></center>';

            $dados['dados'][$i][] = $value->pe_id;
            $dados['dados'][$i][] = $value->pe_descricao;
            $dados['dados'][$i][] = $botoes;
            $i++;
        }

        return $dados;
    }

    function getById($id){

        $this->db->select('*');
        $this->db->from('perfil');
        $this->db->where('pe_id', $id);
        $query = $this->db->get();
        $ret = $query->result();

        return $ret;
    }

    function buscarPerfis(){

        $this->db->select('pe_id, pe_descricao');
        $this->db->from('perfil');
        $query = $this->db->get();
        $perfis = $query->result_array();

        $ret = array();

        foreach ($perfis as $key => $value) {
            $ret[$value['pe_id']] = $value['pe_descricao'];
        }

        return $ret;
    }

    function cadastrar($dados){
        $this->pe_descricao   = trim($dados['pe_descricao']);
        $this->db->insert('perfil', $this);
    }

    function alterar($dados){
        $this->pe_descricao = trim($dados['pe_descricao']);
        $this->db->update('perfil', $this, array('pe_id' => $dados['pe_id']));
    }

    function excluir($id){
        $this->db->where('pe_id', $id);
        $this->db->delete('perfil');
    }

}
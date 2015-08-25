<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cargo extends CI_Model {

    var $ca_descricao   = '';
    var $ca_atribuicoes = '';

    function __construct()
    {
        parent::__construct();
    }

    function gridCargos()
    {

        $query = $this->db->get('cargo', 100);
        $ret = $query->result();

        $dados = array();
        $i = 0;

        foreach ($ret as $key => $value) {

            $botoes = '<a href='.base_url("index.php/ccargo/manter/".$value->ca_id).' title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>';
            $botoes .= '&nbsp;&nbsp;&nbsp;<a href='.base_url("index.php/ccargo/excluir/".$value->ca_id).' title="Excluir"><span class="glyphicon glyphicon-remove"></span></a>';

            $dados['dados'][$i][] = $value->ca_id;
            $dados['dados'][$i][] = $value->ca_descricao;
            $dados['dados'][$i][] = $value->ca_atribuicoes;
            $dados['dados'][$i][] = $botoes;
            $i++;
        }

        return $dados;
    }

    function getById($id){

        $this->db->select('*');
        $this->db->from('cargo');
        $this->db->where('ca_id', $id);
        $query = $this->db->get();
        $ret = $query->result();

        return $ret;
    }

    function buscarCargos(){

        $this->db->select('ca_id, ca_descricao');
        $this->db->from('cargo');
        $query = $this->db->get();
        $cargos = $query->result_array();

        $ret = array();

        foreach ($cargos as $key => $value) {
            $ret[$value['ca_id']] = $value['ca_descricao'];
        }

        return $ret;
    }

    function cadastrar($dados)
    {
        $this->ca_descricao   = trim($dados['ca_descricao']);
        $this->ca_atribuicoes = trim($dados['ca_atribuicoes']);
        $this->db->insert('cargo', $this);
    }

    function alterar($dados)
    {
        $this->ca_descricao   = trim($dados['ca_descricao']);
        $this->ca_atribuicoes = trim($dados['ca_atribuicoes']);
        $this->db->update('cargo', $this, array('ca_id' => $dados['ca_id']));
    }

    function excluir($id)
    {
        $this->db->where('ca_id', $id);
        $this->db->delete('cargo');
    }
}
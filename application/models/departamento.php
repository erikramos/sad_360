<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departamento extends CI_Model {

    var $de_nome   = '';

    function __construct()
    {
        parent::__construct();
    }

    function gridDepartamentos()
    {

        $query = $this->db->get('departamento', 100);
        $ret = $query->result();

        $dados = array();
        $i = 0;

        foreach ($ret as $key => $value) {

            $botoes = '<center><a href='.base_url("index.php/cdepartamento/manter/".$value->de_id).' title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>';
            $botoes .= '&nbsp;&nbsp;&nbsp;<a href='.base_url("index.php/cdepartamento/excluir/".$value->de_id).' title="Excluir"><span class="glyphicon glyphicon-remove"></span></a></center>';

            $dados['dados'][$i][] = $value->de_id;
            $dados['dados'][$i][] = $value->de_nome;
            $dados['dados'][$i][] = $botoes;
            $i++;
        }

        return $dados;
    }

    function getById($id){

        $this->db->select('*');
        $this->db->from('departamento');
        $this->db->where('de_id', $id);
        $query = $this->db->get();
        $ret = $query->result();

        return $ret;
    }

    function cadastrar($dados){
        $this->de_nome   = trim($dados['de_nome']);
        $this->db->insert('departamento', $this);
    }

    function alterar($dados){
        $this->de_nome = trim($dados['de_nome']);
        $this->db->update('departamento', $this, array('de_id' => $dados['de_id']));
    }

    function excluir($id){
        $this->db->where('de_id', $id);
        $this->db->delete('departamento');
    }
}
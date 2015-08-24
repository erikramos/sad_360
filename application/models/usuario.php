<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Model {

    var $us_nome   = '';
    var $us_login = '';
    var $us_senha = '';
    var $ca_id = '';
    var $de_id = '';
    var $pe_id = '';

    function __construct()
    {
        parent::__construct();
    }

    function gridUsuarios()
    {

        //$query = $this->db->get('usuario', 100);

        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->join('cargo', 'usuario.ca_id = cargo.ca_id');
        $this->db->join('perfil', 'usuario.pe_id = perfil.pe_id');
        $query = $this->db->get();
        $ret = $query->result();

        $dados = array();
        $i = 0;

        foreach ($ret as $key => $value) {

            $botoes = '<center><a href='.base_url("index.php/cusuario/manter/".$value->us_id).' title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>';
            $botoes .= '&nbsp;&nbsp;&nbsp;<a href='.base_url("index.php/cusuario/excluir/".$value->us_id).' title="Excluir"><span class="glyphicon glyphicon-remove"></span></a></center>';

            $dados['dados'][$i][] = $value->us_id;
            $dados['dados'][$i][] = $value->us_nome;
            $dados['dados'][$i][] = $value->us_login;
            $dados['dados'][$i][] = $value->ca_descricao;
            $dados['dados'][$i][] = $value->pe_descricao;
            $dados['dados'][$i][] = $botoes;
            $i++;
        }

        return $dados;
    }

    function getById($id){

        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('us_id', $id);
        $query = $this->db->get();
        $ret = $query->result();

        return $ret;
    }

    function cadastrar($dados){
        $this->us_nome   = trim($dados['us_nome']);
        $this->us_login   = trim($dados['us_login']);
        $this->us_senha   = md5(trim($dados['us_senha']));
        $this->ca_id   = trim($dados['ca_id']);
        $this->de_id   = trim($dados['de_id']);
        $this->pe_id   = trim($dados['pe_id']);

        $this->db->insert('usuario', $this);
    }

    function alterar($dados){
        $this->us_nome   = trim($dados['us_nome']);
        $this->us_login   = trim($dados['us_login']);
        $this->us_senha   = md5(trim($dados['us_senha']));
        $this->ca_id   = trim($dados['ca_id']);
        $this->de_id   = trim($dados['de_id']);
        $this->pe_id   = trim($dados['pe_id']);

        $this->db->update('usuario', $this, array('us_id' => $dados['us_id']));
    }

    function excluir($id){
        $this->db->where('us_id', $id);
        $this->db->delete('usuario');
    }

}
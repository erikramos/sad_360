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

    function cadastrar($dados)
    {
        $this->ca_descricao   = trim($dados['ca_descricao']);
        $this->ca_atribuicoes = trim($dados['ca_atribuicoes']);

        //die(var_dump($this));

        $this->db->insert('cargo', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}
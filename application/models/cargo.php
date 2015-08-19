<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cargo extends CI_Model {

    var $descricao   = '';
    var $atribuicoes = '';

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

            $botoes = '<a href="#" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>';
            $botoes .= '&nbsp;&nbsp;&nbsp;<a href="#" title="Excluir"><span class="glyphicon glyphicon-remove"></span></a>';

            $dados['dados'][$i][] = $value->ca_id;
            $dados['dados'][$i][] = $value->ca_descricao;
            $dados['dados'][$i][] = $value->ca_atribuicoes;
            $dados['dados'][$i][] = $botoes;
            $i++;
        }

        return $dados;
    }

    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}
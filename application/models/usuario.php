<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Model {

    var $descricao   = '';
    var $atribuicoes = '';

    function __construct()
    {
        parent::__construct();
    }

    function gridUsuarios()
    {

        $query = $this->db->get('usuario', 100);
        $ret = $query->result();

        $dados = array();
        $i = 0;

        foreach ($ret as $key => $value) {

            $dados['dados'][$i][] = $value->us_id;
            $dados['dados'][$i][] = $value->us_nome;
            $dados['dados'][$i][] = $value->us_login;
            $dados['dados'][$i][] = 'cargo';
            $dados['dados'][$i][] = 'perfil';
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
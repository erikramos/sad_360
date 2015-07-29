<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departamento extends CI_Model {

    var $descricao   = '';
    var $atribuicoes = '';

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

            $dados['dados'][$i][] = $value->de_id;
            $dados['dados'][$i][] = $value->de_nome;
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
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avaliacao extends CI_Model {

    var $descricao   = '';
    var $atribuicoes = '';

    function __construct()
    {
        parent::__construct();
    }

    function gridAvaliacoes()
    {

        $status = array(
            0=>'<font color="red">Inativa</font>',
            1=>'<font color="green">Ativa</font>',
            2=>'<font color="blue">Finalizada</font>'
        );

        $query = $this->db->get('avaliacao', 100);
        $ret = $query->result();

        $dados = array();
        $i = 0;

        foreach ($ret as $key => $value) {

            $dados['dados'][$i][] = $value->av_id;
            $dados['dados'][$i][] = $value->av_titulo;
            $dados['dados'][$i][] = $value->av_descricao;
            $dados['dados'][$i][] = $value->av_data_cadastro;
            $dados['dados'][$i][] = $status[$value->av_status];
            $dados['dados'][$i][] = 'botoes';
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
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CBase extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->iniciaSessao();

         if ($this->_checaPaginaExcecao()) {

             $this->_checaAutenticado();
         }
    }


    /**
     * inicia a sessao se ela ja nao estiver iniciada
     */
    public function iniciaSessao() {
        if (!isset($_SESSION))
            session_start();
    }

    /**
     * checa se o usuario esta autenticado
     */
    private function _checaAutenticado() {

        // Verificação não se aplica a chamadas ajax
        if ($this->input->is_ajax_request()) {
            return;
        }

        if (isset($_SESSION['usuario']) && !is_null($_SESSION['usuario'])) {
            return;
        }else{
            $this->session->set_flashdata('erro', 'Realize o login no sistema.');
            redirect(base_url("index.php/clogin/"), 'refresh');
        }
    }

    /**
     * verifica se a pagina atual deve ser checada a autenticacao e permissao
     *
     * @return boolean (true - deve ser checada)
     */
    private function _checaPaginaExcecao() {

        $lista_excecao[] = 'clogin/index';
        $lista_excecao[] = 'clogin/logar';

        $acesso[] = $this->router->fetch_class() . '/' . $this->router->fetch_method();
        $acesso[] = $this->router->fetch_class() . '/*';

        foreach ($acesso as $tmp_acesso) {

            if (in_array($tmp_acesso, $lista_excecao)) return false;
        }

        return true;
    }
}

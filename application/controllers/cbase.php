<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CBase extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->iniciaSessao();

        // if ($this->_checaPaginaExcecao()) {

        //     $this->_checaAutenticado();
        //     $this->_checaPermissao();
        // }
    }


    /**
     * inicia a sessao se ela ja nao estiver iniciada
     */
    public function iniciaSessao() {
        if (!isset($_SESSION))
            session_start();

            //temporariamente seta o usuario da sessao
            $_SESSION['usuario']->us_id = 1;
    }

    /**
     * checa se o usuario esta autenticado
     */
    private function _checaAutenticado() {

        // Verificação não se aplica a chamadas ajax
        if ($this->input->is_ajax_request()) {
            return;
        }

        if (! isset($_SESSION['usuario'])) {
            // Comentado pois aparentemente não é usuado em lugar nenhum
            // $_SESSION['url'] = current_url();
            redirect(site_url() . '/cpainel/', 'refresh');
            return;
        }

        // A sessão existe, verifica se o id da sessão do usuário é igual ao da sessão no banco de dados
        $this->db->select('COUNT(*) AS sessao_valida');
        $this->db->from('usuario');
        $this->db->where('us_login = "'.$_SESSION['usuario']->us_login.'"');
        $this->db->where('us_senha = "'.$_SESSION['usuario']->us_senha.'"');
        $this->db->where('us_sessao = "'.$_SESSION['usuario']->idSessao.'"');

        $usSessao = $this->db->get()->row();

        // Se o count for 0, significa que o usuário fez login em outra máquina
        if ($usSessao->sessao_valida == 0) {
            //redirect(site_url() . '/clogin/formLogin/10');
        }

    }

    /**
     * checa se o usuario tem permissao para acessar a pagina e o metodo
     */
    private function _checaPermissao() {
        $rClass = $this->router->fetch_class() . '/' . $this->router->fetch_method();
        $acessos[] = $this->router->fetch_class() . '/*';
        $acessos[] = $rClass;
        $acessos[] = $this->router->fetch_directory() . $rClass;

        foreach ($acessos as $acesso) {
            // Encontrou a permissão posso retornar a função
            if ((in_array($acesso, $_SESSION['usuario']->controlador_autorizado)) === TRUE) {
                return;
            }
        }

        // Verifica se é uma requisição ajax
        if ($this->input->is_ajax_request()) {
            $this->output->set_status_header('401', 'Desculpe, voce nao tem permissao para esta acao.');
            exit(1);
        } else {
            redirect(site_url() . '/cusuario/semPermissao', 'refresh');
        }
    }

    /**
     * verifica se a pagina atual deve ser checada a autenticacao e permissao
     *
     * @return boolean (true - deve ser checada)
     */
    private function _checaPaginaExcecao() {
        $lista_excecao[] = 'cautenticacao/index';
        $lista_excecao[] = 'cautenticacao/formLogin';
        $lista_excecao[] = 'cautenticacao/login';
        $lista_excecao[] = 'cautenticacao/ajaxLogin';
        $lista_excecao[] = 'cautenticacao/formEsqueciSenha';
        $lista_excecao[] = 'cautenticacao/ajaxValidarCadastrado';
        $lista_excecao[] = 'cautenticacao/ajaxEmailCodigo';
        $lista_excecao[] = 'cautenticacao/alterarSenhaEmail';
        $lista_excecao[] = 'cautenticacao/sair';
        $lista_excecao[] = 'cusuario/semPermissao';
        $lista_excecao[] = 'ccontroleboletos/imprimir';

        //se acessar o controller cimportacao sem ser requisição do usuário é uma requisição CLI (no nosso caso o crontab chamando o agendamento de processamento de carga) por isso libera
        if ($this->input->is_cli_request())
            $lista_excecao[] = 'cimportacao/*';

        $acesso[] = $this->router->fetch_class() . '/' . $this->router->fetch_method();
        $acesso[] = $this->router->fetch_class() . '/*';

        foreach ($acesso as $tmp_acesso) {

            if (in_array($tmp_acesso, $lista_excecao)) return false;
        }

        return true;
    }
}

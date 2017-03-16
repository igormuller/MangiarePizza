<?php
class pessoaController extends controller {
    
    public function __construct() {
        parent::__construct();
        $usuario = new Usuario();
        if (!$usuario->isLogged()){
            header("Location: ".BASE_URL."/login");
        }
    }
    
    public function index() {
        $dados = array(
            'pessoas' => array()
        );
        
        $pessoa = new Pessoa();
        $dados['pessoas'] = $pessoa->getPessoas();
        $this->loadTemplate('pessoa', $dados);
    }
    
    public function add() {
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $pessoa = new Pessoa();
            $pessoa->setNome(addslashes($_POST['nome']));
            $endereco = addslashes($_POST['endereco']).", ".addslashes($_POST['numero']);
            if (isset($_POST['complemento']) && !empty($_POST['complemento'])) {
                $endereco .= ", ".addslashes($_POST['complemento']);
            }
            $endereco .= ", ".addslashes($_POST['bairro']).", ".addslashes($_POST['cidade']);
            $pessoa->setEndereco($endereco);
            $pessoa->setTelefone(addslashes($_POST['telefone']));
            $pessoa->setEmail(addslashes($_POST['email']));
            $pessoa->add();
            header("Location: ".BASE_URL."/pessoa");
        }
        
        $this->loadTemplate('pessoaAdd');
    }
    
}
?>
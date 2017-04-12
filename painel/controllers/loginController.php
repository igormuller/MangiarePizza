<?php
class loginController extends controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $dados = array(
            'info' => ''
        );
        
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $senha = md5($_POST['senha']);
            $user = new Pessoa();
            if ($user->validaPessoa($email, $senha)) {
                header("Location: ".BASE_URL);
            } else {
                $dados['info'] = "E-mail e/ou Senha incorretos!";
            }
        }         
        
        $this->loadView('login', $dados);
    }
    
    public function add() {
        $dados = array(
            'info' => ''
        );
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $pessoa = new Pessoa();
            if ($pessoa->isExisteEmail($_POST['email'])) {
                $dados['info'] = "E-mail já existente.";
            } else {
                $pessoa->setNome(addslashes($_POST['nome']));
                $endereco = addslashes($_POST['endereco']).",".addslashes($_POST['numero']);
                $endereco .= ",".addslashes($_POST['complemento']);
                $endereco .= ",".addslashes($_POST['bairro']).",".addslashes($_POST['cidade']).",".addslashes($_POST['estado']).",".addslashes($_POST['cep']);
                $pessoa->setEndereco($endereco);
                $pessoa->setTelefone(addslashes($_POST['telefone']));
                $pessoa->setEmail(addslashes($_POST['email']));
                $pessoa->setSenha(md5($_POST['senha']));
                
                $_SESSION['pLogado'] = $pessoa->add();
                $_SESSION['nomePLogado'] = $pessoa->getNome();
                header("Location: ".BASE_URL);
            }            
        }
        
        $this->loadView('loginAdd', $dados);
    }
    
    public function logOut() {
        unset($_SESSION['pLogado']);
        unset($_SESSION['nomePLogado']);
        header("Location: ".BASE_URL);
    }
    
}
?>
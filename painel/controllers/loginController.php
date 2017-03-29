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
    
    public function logOut() {
        unset($_SESSION['pLogado']);
        unset($_SESSION['nomePLogado']);
        header("Location: ".BASE_URL);
    }
    
}
?>
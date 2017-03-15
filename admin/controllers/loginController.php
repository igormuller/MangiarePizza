<?php
class loginController extends controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $dados = array(
            'info' => ''
        );
        
        if (isset($_POST['login']) && !empty($_POST['login'])) {
            $login = addslashes($_POST['login']);
            $senha = md5($_POST['senha']);
            $usuario = new Usuario();
            if ($usuario->validaUsuario($login, $senha)) {
                header("Location: ".BASE_URL);
            } else {
                $dados['info'] = "Usuario e/ou Senha incorretos!";
            }
        }         
        
        $this->loadView('login', $dados);
    }
    
    public function logOut() {
        unset($_SESSION['uLogado']);
        unset($_SESSION['nomeLogado']);
        header("Location: ".BASE_URL);
    }
    
}
?>
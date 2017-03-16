<?php
class usuarioController extends controller {
    
    public function __construct() {
        parent::__construct();
        $usuario = new Usuario();
        if (!$usuario->isLogged()){
            header("Location: ".BASE_URL."/login");
        }
    }
    
    public function index($id_usuario = '') {
        $dados = array(
            'info' => '',
            'usuario' => array()
        );
        
        if (isset($id_usuario) && !empty($id_usuario)){
            
            if ($id_usuario === $_SESSION['uLogado']) {
                $usuario = new Usuario();
                
                if (isset($_POST['nome']) && !empty($_POST['nome'])) {
                    $usuario->setId_usuario($id_usuario);
                    $usuario->setNome(addslashes($_POST['nome']));
                    if (isset($_POST['senha']) && !empty($_POST['senha'])) {
                        $usuario->setSenha(md5($_POST['senha']));
                    }
                    $usuario->update();
                }
                $dados['usuario'] = $usuario->getUsuario($id_usuario);
                $dados['info'] = "Usuário editado com sucesso!";
                $this->loadTemplate('usuarioEdit', $dados);
            } else {
                header("Location: ".BASE_URL);
            }
        } else {
            header("Location: ".BASE_URL);
        }
    }
}
?>
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
            'usuario' => array()
        );
        
        if (isset($id_usuario) && !empty($id_usuario)){
            
            if ($id_usuario === $_SESSION['uLogado']) {
                $usuario = new Usuario();
                $dados['usuario'] = $usuario->getUsuario($id_usuario);
                
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
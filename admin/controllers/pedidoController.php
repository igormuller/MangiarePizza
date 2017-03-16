<?php
class pedidoController extends controller {
    
    public function __construct() {
        parent::__construct();
        $usuario = new Usuario();
        if (!$usuario->isLogged()){
            header("Location: ".BASE_URL."/login");
        }
    }
    
    public function index() {
        $dados = array(
            'pizzas' => 0
        );
        
        $pizzas = new Pizza();
        $dados['pizzas'] = count($pizzas->getPizzas());
        $this->loadTemplate('pedido', $dados);
    }
    
}
?>
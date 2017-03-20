<?php
class homeController extends controller {
    
    public function __construct() {
        parent::__construct();
        $usuario = new Usuario();
        if (!$usuario->isLogged()){
            header("Location: ".BASE_URL."/login");
        }
    }
    
    public function index() {
        $dados = array(
            'pizzas' => 0,
            'pessoas' => 0,
            'pedido_novo' => 0,
            'pedido_entrega' => 0
        );
        
        $pizzas = new Pizza();
        $dados['pizzas'] = count($pizzas->getPizzas());
        $pessoa = new Pessoa();
        $dados['pessoas'] = count($pessoa->getPessoas());
        $pedido = new Pedido();
        $dados['pedido_novo'] = count($pedido->getPedidoStatus(1));
        $dados['pedido_entrega'] = count($pedido->getPedidoStatus(3));
        $this->loadTemplate('home', $dados);
    }
    
}
?>
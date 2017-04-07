<?php

class pizza_pedidoController extends controller {
    
    public function __construct() {
        parent::__construct();
        $user = new Pessoa();
        if (!$user->isLogged()){
            header("Location: ".BASE_URL."/login");
        }
    }
    
    public function index() {
        header("Location: ".BASE_URL."/pedido");
    }
    
    public function remove($id_pedido, $id_pizza) {
        $pp = new Pizza_Pedido();
        $pedido = new Pedido();
        
        $pp->remove($id_pedido, $id_pizza);
        
        $valor = $pp->getValorTotalPedido($id_pedido);
        $pedido->atualizaValor($id_pedido, $valor);
        header("Location: ".BASE_URL."/pedido/edit/".$id_pedido);
    }
    
    
}
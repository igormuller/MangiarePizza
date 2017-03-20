<?php

class pizza_pedidoController extends controller {
    
    public function __construct() {
        parent::__construct();
        $usuario = new Usuario();
        if (!$usuario->isLogged()){
            header("Location: ".BASE_URL."/login");
        }
    }
    
    public function index() {
        header("Location: ".BASE_URL."/pedido");
    }
    
    public function add($id_pedido) {
        $dados = array(
            'pedido' => array(),
            'pizzas' => array(),
            'massas' => array()
        );
        $pedido = new Pedido();
        $pizza = new Pizza();
        $massa = new Massa();
        
        if (isset($_POST['id_pizza']) && !empty($_POST['id_pizza'])) {
            $pp = new Pizza_Pedido();
            
            $pp->setId_pedido($id_pedido);
            $pp->setId_pizza($_POST['id_pizza']);
            $pp->setId_massa($_POST['id_massa']);
            $pp->setQuantidade($_POST['quantidade']);
            $pp->add();
            header("Location: ".BASE_URL."/pedido/edit/".$id_pedido);
        }
        
        $dados['pedido'] = $id_pedido;
        $dados['pizzas'] = $pizza->getPizzas();
        $dados['massas'] = $massa->getMassas();
        $this->loadTemplate('pizzapedidoAdd', $dados);
    }
    
    public function edit($id_pedido, $id_pizza, $id_massa) {
        $dados = array(
            'pedido' => 0,
            'pizza' => '',
            'massa' => '',
            'pp_id_pizza' => $id_pizza,
            'pp_id_massa' => $id_massa,
            'pp' => array()
        );
        $pizza = new Pizza();
        $massa = new Massa();
        $pp = new Pizza_Pedido();
        
        if (isset($_POST['quantidade']) && !empty($_POST['quantidade'])) {
            $pp->setId_pedido($id_pedido);
            $pp->setId_pizza($id_pizza);
            $pp->setId_massa($id_massa);
            $pp->setQuantidade($_POST['quantidade']);
            $pp->update();
            header("Location: ".BASE_URL."/pedido/edit/".$id_pedido);
        }
        
        $dados['pedido'] = $id_pedido;
        $dados['pizza'] = $pizza->getPizza($id_pizza)['nome'];
        $dados['massa'] = $massa->getMassa($id_massa)['nome'];
        $dados['pp'] = $pp->getPizzaPedidoIdPedidoIdPizzaIdMassa($id_pedido,$id_pizza,$id_massa);
        $this->loadTemplate('pizzapedidoEdit', $dados);
    }
    
    public function remove($id_pedido, $id_pizza, $id_massa) {
        $pp = new Pizza_Pedido();
        $pp->remove($id_pedido, $id_pizza, $id_massa);
        header("Location: ".BASE_URL."/pedido/edit/".$id_pedido);
    }
    
    
}
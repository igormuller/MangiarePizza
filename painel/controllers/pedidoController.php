<?php
class pedidoController extends controller {
    
    public function __construct() {
        parent::__construct();
        $user = new Pessoa();
        if (!$user->isLogged()){
            header("Location: ".BASE_URL."/login");
        }
    }
    
    public function index() {
        $dados = array(
            'pedidos' => array()
        );
        $pedido = new Pedido();
        $dados['pedidos'] = $pedido->getPedidoPessoa($_SESSION['pLogado']);
        $this->loadTemplate('pedido', $dados);
    }
    
    public function view($id_pedido) {
        $dados = array(
            'pedido' => array()
        );
        $pedido = new Pedido();
        $dados['pedido'] = $pedido->getPedido($id_pedido);
        $this->loadTemplate('pedidoView', $dados);
    }
    
    public function add() {
        $dados = array();
        $pedido = new Pedido();
        if (isset($_POST['id_pessoa']) && !empty($_POST['id_pessoa'])) {
            $id_pedido = $pedido->add($_POST['id_pessoa'], $_POST['observacao']);
            header("Location: ".BASE_URL."/pedido/edit/".$id_pedido);
        }
        $this->loadTemplate('pedidoAdd', $dados);
    }
    
    public function edit($id_pedido) {
        $dados = array(
            'info' => '',
            'status_pedido' => array(),
            'pedido' => array(),
            'pizza_pedido' => array(),
            'pizzas' => array()
        );
        $status = new Status_Pedido();
        $pedido = new Pedido();
        $pp = new Pizza_Pedido;
        $pizza = new Pizza();
        
        if (isset($_POST['id_pessoa']) && !empty($_POST['id_pessoa'])) {
            $pedido->update($id_pedido,$_POST['observacao']);
            $dados['info'] = "Pedido editado com sucesso!";
        }
        
        //Novo pizza_pedido
        if (isset($_POST['id_pizza_add']) && !empty($_POST['id_pizza_add'])) {
            $pp->setId_pedido($id_pedido);
            $pp->setId_pizza($_POST['id_pizza_add']);
            $pp->setQuantidade($_POST['quantidade_add']);
            $pp->add();
            
            $valor = $pp->getValorTotalPedido($id_pedido);
            $pedido->atualizaValor($id_pedido, $valor);
            
            
        }
        
        //Editar pizza_pedido
        if (isset($_POST['quantidade_edit']) && !empty($_POST['quantidade_edit'])) {
            $pp->setId_pedido($id_pedido);
            $pp->setId_pizza($_POST['id_pizza_edit']);
            $pp->setQuantidade($_POST['quantidade_edit']);
            $pp->update();
            
            $valor = $pp->getValorTotalPedido($id_pedido);
            $pedido->atualizaValor($id_pedido, $valor);
        }
        
        
        $dados['status_pedido'] = $status->getStatus_pedido();
        $dados['pedido'] = $pedido->getPedido($id_pedido);
        $dados['pizza_pedido'] = $pp->getPizzaPedidoIdPedido($id_pedido);
        $dados['pizzas'] = $pizza->getPizzas();
        if ($dados['pedido']['id_status_pedido'] === '1') {
            $this->loadTemplate('pedidoEdit',$dados);
        } else {
            header("Location: ".BASE_URL."/pedido");
        }        
    }
    
    public function cancel($id_pedido) {
        if (isset($id_pedido) && !empty($id_pedido)) {
            $pedido = new Pedido();
            $dados['pedido'] = $pedido->getPedido($id_pedido);
            
            if ($dados['pedido']['id_status_pedido'] === '1') {
                $pedido->cancel($id_pedido);
                header("Location: ".BASE_URL."/pedido");
            } else {
                header("Location: ".BASE_URL."/pedido");
            }
        } else {
            header("Location: ".BASE_URL."/pedido");
        }
        
    }
    
}
?>
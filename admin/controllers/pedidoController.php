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
            'pedidos' => array()
        );
        
        $pedido = new Pedido();
        $dados['pedidos'] = $pedido->getPedidos();
        $this->loadTemplate('pedido', $dados);
    }
    
    public function add() {
        $dados = array(
            'pessoas' => array(),
            'status_pedido' => array()
        );
        $pessoa = new Pessoa();
        $status = new Status_Pedido();
        $dados['pessoas'] = $pessoa->getPessoas();
        $dados['status_pedido'] = $status->getStatus_pedido();
        $this->loadTemplate('pedidoAdd',$dados);
    }
    
    public function edit($id_pedido) {
        $dados = array(
            'pessoas' => array(),
            'status_pedido' => array(),
            'pizzas' => array(),
            'massas' => array(),
            'pedido' => array()
        );
        $pessoa = new Pessoa();
        $status = new Status_Pedido();
        $pizza = new Pizza();
        $massa = new Massa();
        $pedido = new Pedido();
        
        if (isset($_POST['id_pizza']) && !empty($_POST['id_pizza'])) {
            echo $_POST['id_pizza'];
            echo " - ".$_POST['id_massa'];
            echo " - ".$_POST['quantidade'];
            exit;
        }
        
        $dados['pessoas'] = $pessoa->getPessoas();
        $dados['status_pedido'] = $status->getStatus_pedido();
        $dados['pizzas'] = $pizza->getPizzas();
        $dados['massas'] = $massa->getMassas();
        $dados['pedido'] = $pedido->getPedido($id_pedido);
        $this->loadTemplate('pedidoEdit',$dados);
    }
    
}
?>
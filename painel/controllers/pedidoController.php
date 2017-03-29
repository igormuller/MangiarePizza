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
    
}
?>
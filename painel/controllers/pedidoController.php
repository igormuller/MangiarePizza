<?php
class pedidoController extends controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $dados = array();
        $this->loadTemplate('pedido', $dados);
    }
    
}
?>
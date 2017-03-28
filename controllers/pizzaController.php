<?php
class pizzaController extends controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $dados = array(
            "pizzas" => array()
        );
        $pizza = new Pizza();
        $dados['pizzas'] = $pizza->getPizzas();
        $this->loadTemplate('pizza', $dados);
    }
    
}
?>
<?php
class contatoController extends controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $dados = array();
        $this->loadTemplate('contato', $dados);
    }
    
}
?>
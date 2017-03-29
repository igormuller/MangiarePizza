<?php
class homeController extends controller {
    
    public function __construct() {
        parent::__construct();
        $user = new Pessoa();
        if (!$user->isLogged()){
            header("Location: ".BASE_URL."/login");
        }
    }
    
    public function index() {
        $dados = array();
        $this->loadTemplate('home', $dados);
    }
    
}
?>
<?php
class pizzaController extends controller {
    
    public function __construct() {
        parent::__construct();
        $usuario = new Usuario();
        if (!$usuario->isLogged()){
            header("Location: ".BASE_URL."/login");
        }
    }
    
    public function index() {
        $dados = array(
            'pizzas' => array(),
            'massas' => array()
        );
        $massa = new Massa();
        $dados['massas'] = $massa->getMassas();
        $pizza = new Pizza();
        $dados['pizzas'] = $pizza->getPizzas();
        
        $this->loadTemplate('pizza', $dados);
    }
    
    public function add() {
        $dados = array(
            'massas' => array()
        );
        $massa = new Massa();
        $dados['massas'] = $massa->getMassas();
        
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $pizza = new Pizza();
            $pizza->setNome(addslashes($_POST['nome']));
            $pizza->setPreco_custo(addslashes($_POST['preco_custo']));
            $pizza->setPreco_venda(addslashes($_POST['preco_venda']));
            $pizza->setId_massa($_POST['id_massa']);
            $pizza->setIngredientes(addslashes($_POST['ingredientes']));
            
            if (isset($_FILES['imagem']) && !empty($_FILES['imagem']['tmp_name'])) {
               
                $permitidos = array('image/jpeg','image/jpg','image/png');
                
                if(in_array($_FILES['imagem']['type'], $permitidos)){
                    
                    $nome = md5(time().rand(0, 999)).'.png';
                    move_uploaded_file($_FILES['imagem']['tmp_name'], 'assets/images/pizzas/'.$nome);
                    $pizza->setImagem($nome);
                    
                } else {
                    $dados['info'] = "Arquivo não permitido!";
                } 
            }
            $pizza->add();
            header("Location: ".BASE_URL."/pizza");
            
        }
        
        $this->loadTemplate('pizzaAdd', $dados);
    }
    
}
?>
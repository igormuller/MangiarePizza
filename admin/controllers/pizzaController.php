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
            'pizzas' => array()
        );
        $pizza = new Pizza();
        $dados['pizzas'] = $pizza->getPizzas();
        
        $this->loadTemplate('pizza', $dados);
    }
    
    public function add() {
        $dados = array();
        
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $pizza = new Pizza();
            $pizza->setNome(addslashes($_POST['nome']));
            $pizza->setPreco_custo(str_replace(',','.',addslashes($_POST['preco_custo'])));
            $pizza->setPreco_venda(str_replace(',','.',addslashes($_POST['preco_venda'])));
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
    
    public function edit($id_pizza) {
        $dados = array(
            'info' => '',
            'pizza' => array()
        );
        
        //Verifica se foi setado a informação $id_pizza na URL.
        if (isset($id_pizza) && !empty($id_pizza)) {
            $pizza = new Pizza();
            $array = $pizza->getPizza($id_pizza);
            
            //Verifica se foi setado o nome no formulário
            if (isset($_POST['nome']) && !empty($_POST['nome'])) {
                $pizza->setId_pizza($id_pizza);
                $pizza->setNome(addslashes($_POST['nome']));
                $pizza->setPreco_custo(str_replace(',','.',addslashes($_POST['preco_custo'])));
                $pizza->setPreco_venda(str_replace(',','.',addslashes($_POST['preco_venda'])));
                $pizza->setIngredientes(addslashes($_POST['ingredientes']));
                
                //verifica se foi informado imagem no formulário
                if (isset($_FILES['imagem']) && !empty($_FILES['imagem']['tmp_name'])) {

                    $permitidos = array('image/jpeg','image/jpg','image/png');

                    if(in_array($_FILES['imagem']['type'], $permitidos)){

                        $nome = md5(time().rand(0, 999)).'.png';
                        
                        //Verifica sejá existia uma imagem, para permitir apagar a imagem no servidor.
                        if (!empty($pizza->getImagem())) {
                            unlink("assets/images/pizzas/".$array['imagem']);
                        }
                        move_uploaded_file($_FILES['imagem']['tmp_name'], 'assets/images/pizzas/'.$nome);
                        $pizza->setImagem($nome);

                    } else {
                        $dados['info'] = "Arquivo não permitido!";
                    } 
                }
                $pizza->update();
                $dados['info'] = "Pizza editada com sucesso!";
            }
                      
            $dados['pizza'] = $pizza->getPizza($id_pizza);
        }
        
        $this->loadTemplate('pizzaEdit', $dados);
    }
    
    
    public function remove($id_pizza) {
        
        if (isset($id_pizza) && !empty($id_pizza)) {
            $pizza = new Pizza();
            $array = $pizza->getPizza($id_pizza);
            
            if (!empty($array['imagem'])) {
                unlink("assets/images/pizzas/".$array['imagem']);
            }
            $pizza->remove($id_pizza);
        }
        
        header("Location: ".BASE_URL."/pizza");
    }
    
}
?>
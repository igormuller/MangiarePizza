<?php
class userController extends controller {
    
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
    
    public function edit($id_pessoa) {
        $dados = array(
            'info' => '',
            'pessoa' => array(),
            'endereco' => array()
        );
        if (isset($id_pessoa) && !empty($id_pessoa)) {
            
            if ($id_pessoa === $_SESSION['pLogado']) {
                $pessoa = new Pessoa();
                if ($pessoa->isExiste($id_pessoa)){
                    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
                        $pessoa->setId_pessoa($id_pessoa);
                        $pessoa->setNome(addslashes($_POST['nome']));
                        $endereco = addslashes($_POST['endereco']).",".addslashes($_POST['numero']);
                        $endereco .= ",".addslashes($_POST['complemento']);
                        $endereco .= ",".addslashes($_POST['bairro']).",".addslashes($_POST['cidade']);
                        $pessoa->setEndereco($endereco);
                        $pessoa->setTelefone(addslashes($_POST['telefone']));
                        $pessoa->setEmail(addslashes($_POST['email']));
                        if (isset($_POST['senha']) && !empty($_POST['senha'])) {
                            $pessoa->setSenha(md5($_POST['senha']));
                        } else {
                            $pessoa->setSenha('');
                        }
                        $pessoa->update();
                        $dados['info'] = "Pessoa editada com sucesso!";
                    }

                    $dados['pessoa'] = $pessoa->getPessoa($id_pessoa);
                    $dados['endereco'] = explode(',', $dados['pessoa'][2]);
                    $this->loadTemplate('user', $dados);
                } else {
                    header("Location: ".BASE_URL);
                } 
            } else {
                header("Location: ".BASE_URL);
            }             
        } else {
            header("Location: ".BASE_URL);
        }
        
    }
    
}
?>
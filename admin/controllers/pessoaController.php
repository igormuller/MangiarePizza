<?php
class pessoaController extends controller {
    
    public function __construct() {
        parent::__construct();
        $usuario = new Usuario();
        if (!$usuario->isLogged()){
            header("Location: ".BASE_URL."/login");
        }
    }
    
    public function index() {
        $dados = array(
            'pessoas' => array()
        );
        
        $pessoa = new Pessoa();
        $dados['pessoas'] = $pessoa->getPessoas();
        $this->loadTemplate('pessoa', $dados);
    }
    
    public function add() {
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $pessoa = new Pessoa();
            $pessoa->setNome(addslashes($_POST['nome']));
            $endereco = addslashes($_POST['endereco']).",".addslashes($_POST['numero']);
            $endereco .= ",".addslashes($_POST['complemento']);
            $endereco .= ",".addslashes($_POST['bairro']).",".addslashes($_POST['cidade']).",".addslashes($_POST['estado']).",".addslashes($_POST['cep']);
            $pessoa->setEndereco($endereco);
            $pessoa->setTelefone(addslashes($_POST['telefone']));
            $pessoa->setEmail(addslashes($_POST['email']));
            $pessoa->setSenha(md5($_POST['senha']));
            $pessoa->add();
            header("Location: ".BASE_URL."/pessoa");
        }
        
        $this->loadTemplate('pessoaAdd');
    }
    
    public function edit($id_pessoa) {
        $dados = array(
            'info' => '',
            'pessoa' => array(),
            'endereco' => array()
        );
        if (isset($id_pessoa) && !empty($id_pessoa)) {
            $pessoa = new Pessoa();
            if ($pessoa->isExiste($id_pessoa)){
                if (isset($_POST['nome']) && !empty($_POST['nome'])) {
                    $pessoa->setId_pessoa($id_pessoa);
                    $pessoa->setNome(addslashes($_POST['nome']));
                    $endereco = addslashes($_POST['endereco']).",".addslashes($_POST['numero']);
                    $endereco .= ",".addslashes($_POST['complemento']);
                    $endereco .= ",".addslashes($_POST['bairro']).",".addslashes($_POST['cidade']).",".addslashes($_POST['estado']).",".addslashes($_POST['cep']);
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
            } else {
                header("Location: ".BASE_URL."/pessoa");
            }
        } else {
            header("Location: ".BASE_URL."/pessoa");
        }
        
        $this->loadTemplate('pessoaEdit', $dados);
    }
    
    public function remove($id_pessoa) {
        if (isset($id_pessoa) && !empty($id_pessoa)) {
            $pessoa = new Pessoa();          
            $pessoa->remove($id_pessoa);
        }
        
        header("Location: ".BASE_URL."/pessoa");        
    }
    
}
?>
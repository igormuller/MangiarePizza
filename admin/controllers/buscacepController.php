<?php
class buscacepController extends controller {
    
    public function __construct() {
        parent::__construct();
        $usuario = new Usuario();
        if (!$usuario->isLogged()){
            header("Location: ".BASE_URL."/login");
        }
    }
    
    public function index() {
        $dados = array(
            'registros' => array(),
            'info' => ''
        );
        
        if (isset($_POST['endereco']) && !empty($_POST['endereco'])) {
            $endereco = addslashes($_POST['endereco']);
            $cidade = addslashes($_POST['cidade']);
            $estado = addslashes($_POST['estado']);
            
            if (strlen($endereco) >= 3) {
                if (strlen($cidade) >= 3) {
                    $url = "https://viacep.com.br/ws/".$estado."/".$cidade."/".$endereco."/json/";
                    $json = file_get_contents($url);
                    $array = json_decode($json,TRUE); 
                    if (!empty($array)) {
                        $dados['registros'] = $array;
                        if (count($array) === 100) {
                            $dados['info'] = "A consulta retorna no máximo 100 registros. Refine sua busca.";
                        }
                    }
                } else {
                    $dados['info'] = "Cidade deve possuir no mínimo 3 (três) caracteres";
                }                
            } else {
                $dados['info'] = "Endereço deve possuir no mínimo 3 (três) caracteres";
            }            
        }
        
        $this->loadTemplate('buscaCep', $dados);
    }
    
}
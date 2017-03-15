<?php

class Pizza extends model {
    
    private $id_pizza, $id_massa;
    private $nome, $imagem;
    private $preco_custo, $preco_venda;
    private $ingredientes;


    public function add() {
        $sql = $this->db->prepare("INSERT INTO pizza SET "
                . "nome = :nome, "
                . "ingredientes = :ingredientes, "
                . "preco_custo = :preco_custo, "
                . "preco_venda = :preco_venda, "
                . "imagem = :imagem, "
                . "id_massa = :id_massa");
        $sql->bindValue(":nome", $this->getNome());
        $sql->bindValue(":ingredientes", $this->getIngredientes());
        $sql->bindValue(":preco_custo", $this->getPreco_custo());
        $sql->bindValue(":preco_venda", $this->getPreco_venda());
        $sql->bindValue(":imagem", $this->getImagem());
        $sql->bindValue(":id_massa", $this->getId_massa());
        $sql->execute();
    }
    
    public function getPizzas() {
        $sql = $this->db->prepare("SELECT * FROM pizza");
        $sql->execute();
        
        $array = array();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }


    /*
     * Getters and Setters
     */
    function getId_pizza() {
        return $this->id_pizza;
    }

    function getId_massa() {
        return $this->id_massa;
    }

    function getNome() {
        return $this->nome;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getPreco_custo() {
        return $this->preco_custo;
    }

    function getPreco_venda() {
        return $this->preco_venda;
    }

    function getIngredientes() {
        return $this->ingredientes;
    }

    function setId_pizza($id_pizza) {
        $this->id_pizza = $id_pizza;
    }

    function setId_massa($id_massa) {
        $this->id_massa = $id_massa;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setPreco_custo($preco_custo) {
        $this->preco_custo = $preco_custo;
    }

    function setPreco_venda($preco_venda) {
        $this->preco_venda = $preco_venda;
    }

    function setIngredientes($ingredientes) {
        $this->ingredientes = $ingredientes;
    }


}
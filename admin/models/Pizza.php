<?php

class Pizza extends model {
    
    private $id_pizza;
    private $nome, $imagem;
    private $preco_custo, $preco_venda;
    private $ingredientes;


    public function add() {
        $sql = $this->db->prepare("INSERT INTO pizza SET "
                . "nome = :nome, "
                . "ingredientes = :ingredientes, "
                . "preco_custo = :preco_custo, "
                . "preco_venda = :preco_venda, "
                . "imagem = :imagem");
        $sql->bindValue(":nome", $this->getNome());
        $sql->bindValue(":ingredientes", $this->getIngredientes());
        $sql->bindValue(":preco_custo", $this->getPreco_custo());
        $sql->bindValue(":preco_venda", $this->getPreco_venda());
        $sql->bindValue(":imagem", $this->getImagem());
        $sql->execute();
    }
    
    public function update() {
        $comando = "UPDATE pizza SET "
                    . "nome = :nome, "
                    . "ingredientes = :ingredientes, "
                    . "preco_custo = :preco_custo, "
                    . "preco_venda = :preco_venda, ";
        if (!empty($this->getImagem())) {
            $comando .= "imagem = :imagem ";
        }
        $comando .= "WHERE "
                    . "id_pizza = :id_pizza";        
        $sql = $this->db->prepare($comando);
        $sql->bindValue(":nome", $this->getNome());
        $sql->bindValue(":ingredientes", $this->getIngredientes());
        $sql->bindValue(":preco_custo", $this->getPreco_custo());
        $sql->bindValue(":preco_venda", $this->getPreco_venda());
        if (!empty($this->getImagem())) {
            $sql->bindValue(":imagem", $this->getImagem());
        }        
        $sql->bindValue(":id_pizza", $this->getId_pizza());
        $sql->execute();
    }
    
    public function remove($id_pizza) {
        $sql = $this->db->prepare("DELETE FROM pizza WHERE id_pizza = :id_pizza");
        $sql->bindValue(":id_pizza", $id_pizza);
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
    
    public function getPizza($id_pizza) {
        $sql = $this->db->prepare("SELECT * FROM pizza WHERE id_pizza = :id_pizza");
        $sql->bindValue(":id_pizza", $id_pizza);
        $sql->execute();
        
        $array = array();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }


    /*
     * Getters and Setters
     */
    function getId_pizza() {
        return $this->id_pizza;
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
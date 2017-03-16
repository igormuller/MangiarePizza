<?php

class Pessoa extends model {
    
    private $id_pessoa;
    private $nome, $endereco, $telefone, $email;
    
    public function getPessoas() {
        $sql = $this->db->prepare("SELECT * FROM pessoa");
        $sql->execute();
        
        $array = array();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function add() {
        $sql = $this->db->prepare("INSERT INTO pessoa SET "
                . "nome = :nome, "
                . "endereco = :endereco, "
                . "telefone = :telefone, "
                . "email = :email");
        $sql->bindValue(":nome", $this->getNome());
        $sql->bindValue(":endereco", $this->getEndereco());
        $sql->bindValue(":telefone", $this->getTelefone());
        $sql->bindValue(":email", $this->getEmail());
        $sql->execute();
    }


    /*
     * Getters and Setters
     */
    function getId_pessoa() {
        return $this->id_pessoa;
    }

    function getNome() {
        return $this->nome;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function setId_pessoa($id_pessoa) {
        $this->id_pessoa = $id_pessoa;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEmail($email) {
        $this->email = $email;
    }


}
<?php

class Pessoa extends model {
    
    private $id_pessoa;
    private $nome, $endereco, $telefone, $email, $senha;
    
    public function add() {
        $sql = $this->db->prepare("INSERT INTO pessoa SET "
                . "nome = :nome, "
                . "endereco = :endereco, "
                . "telefone = :telefone, "
                . "email = :email, "
                . "senha = :senha");
        $sql->bindValue(":nome", $this->getNome());
        $sql->bindValue(":endereco", $this->getEndereco());
        $sql->bindValue(":telefone", $this->getTelefone());
        $sql->bindValue(":email", $this->getEmail());
        $sql->bindValue(":senha", $this->getSenha());
        $sql->execute();
        
        return $this->db->lastInsertId();
    }
    
    public function validaPessoa($email, $senha) {
        $sql = $this->db->prepare("SELECT * FROM pessoa WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();
        
        $row = array();
        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
            $_SESSION['pLogado'] = $row['id_pessoa'];
            $_SESSION['nomePLogado'] = $row['nome'];
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function getPessoa($id_pessoa) {
        $sql = $this->db->prepare("SELECT * FROM pessoa WHERE id_pessoa = :id_pessoa");
        $sql->bindValue(":id_pessoa", $id_pessoa);
        $sql->execute();
        
        $array = array();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }
    
    public function update() {
        $comando = "UPDATE pessoa SET "
                . "nome = :nome, "
                . "endereco = :endereco, "
                . "telefone = :telefone, "
                . "email = :email";
        if (!empty($this->getSenha())) {
            $comando .= ", senha = :senha";
        }
        $comando .= " WHERE id_pessoa = :id_pessoa";
        $sql = $this->db->prepare($comando);
        $sql->bindValue(":nome", $this->getNome());
        $sql->bindValue(":endereco", $this->getEndereco());
        $sql->bindValue(":telefone", $this->getTelefone());
        $sql->bindValue(":email", $this->getEmail());
        if (!empty($this->getSenha())) {
            $sql->bindValue(":senha", $this->getSenha());
        }        
        $sql->bindValue(":id_pessoa", $this->getId_pessoa());
        $sql->execute();
    }
    
    public function isLogged() {
        if (isset($_SESSION['pLogado']) && !empty($_SESSION['pLogado'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function isExiste($id_pessoa) {
        $sql = $this->db->prepare("SELECT * FROM pessoa WHERE id_pessoa = :id_pessoa");
        $sql->bindValue(":id_pessoa", $id_pessoa);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function isExisteEmail($email) {
        $sql = $this->db->prepare("SELECT * FROM pessoa WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /*
     * Getters And Setters
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

    function getSenha() {
        return $this->senha;
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

    function setSenha($senha) {
        $this->senha = $senha;
    }


    
}
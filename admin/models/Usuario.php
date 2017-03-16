<?php

class Usuario extends model {
    
    private $id_usuario;
    private $nome, $login, $senha;

    public function isLogged() {
        
        if (isset($_SESSION['uLogado']) && !empty($_SESSION['uLogado'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function validaUsuario($login, $senha) {
        $sql = $this->db->prepare("SELECT * FROM usuario WHERE login = :login AND senha = :senha");
        $sql->bindValue(":login", $login);
        $sql->bindValue(":senha", $senha);
        $sql->execute();
        
        $row = array();
        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
            $_SESSION['uLogado'] = $row['id_usuario'];
            $_SESSION['nomeLogado'] = $row['nome'];
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function getUsuario($id_usuario) {
        $sql = $this->db->prepare("SELECT * FROM usuario WHERE id_usuario = :id_usuario");
        $sql->bindValue(":id_usuario", $id_usuario);
        $sql->execute();
        
        $array = array();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;        
    }
    
    public function loginExiste($login) {
        $sql = $this->db->prepare("SELECT * FROM usuario WHERE login = :login");
        $sql->bindValue(":login", $login);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update() {
        $comando = "UPDATE usuario SET "
                . "nome = :nome";
        if (!empty($this->getSenha())) {
            $comando .= ", senha = :senha";
        }
        $comando .= " WHERE id_usuario = :id_usuario";

        $sql = $this->db->prepare($comando);
        $sql->bindValue(":nome", $this->getNome());
        if (!empty($this->getSenha())) {
            $sql->bindValue(":senha", $this->getSenha());
        }
        
        $sql->bindValue(":id_usuario", $this->getId_usuario());
        $sql->execute();
        
    }
    
    /*
     * Getters and Setters
     */
    function getId_usuario() {
        return $this->id_usuario;
    }

    function getNome() {
        return $this->nome;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }


}
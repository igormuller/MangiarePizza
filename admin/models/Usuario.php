<?php

class Usuario extends model {
    
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
}
<?php

class Pessoa extends model {
    
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
    
    public function isLogged() {
        if (isset($_SESSION['pLogado']) && !empty($_SESSION['pLogado'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
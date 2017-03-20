<?php

class Massa extends model {
    
    public function getMassas() {
        $sql = $this->db->prepare("SELECT * FROM massa");
        $sql->execute();
        
        $array = array();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function getMassa($id_massa) {
        $sql = $this->db->prepare("SELECT * FROM massa WHERE id_massa = :id_massa");
        $sql->bindValue(":id_massa", $id_massa);
        $sql->execute();
        
        $array = array();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }
}
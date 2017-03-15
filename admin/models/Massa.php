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
}
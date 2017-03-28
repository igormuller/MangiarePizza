<?php

class Pizza extends model {
    
    public function getPizzas() {
        $sql = $this->db->prepare("SELECT "
                    . "pizza.*, "
                    . "massa.nome AS massa "
                . "FROM "
                    . "pizza "
                . "LEFT JOIN "
                    . "massa USING (id_massa) "
                . "ORDER BY pizza.nome");
        $sql->execute();
        
        $array = array();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
}
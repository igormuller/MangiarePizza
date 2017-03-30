<?php

class Status_Pedido extends model {
    
    public function getStatus_pedido() {
        $sql = $this->db->prepare("SELECT * FROM status_pedido");
        $sql->execute();
        
        $array = array();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function criarStatusPedido($status) {
        foreach ($status as $sp) {
            $sql = $this->db->prepare("INSERT INTO status_pedido SET nome = :nome");
            $sql->bindValue(":nome", $sp);
            $sql->execute();
        }
    }
}
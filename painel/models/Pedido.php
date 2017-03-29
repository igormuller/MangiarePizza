<?php

class Pedido extends model {
    
    public function getPedidoPessoa($id_pessoa) {
        $sql = $this->db->prepare(
                "SELECT "
                    . "p.*, "
                    . "sp.nome as status_pedido, "
                    . "pessoa.nome as pessoa, "
                    . "(select sum(quantidade) from pizza_pedido where id_pedido = p.id_pedido) as total_pizza "
                . "FROM "
                    . "pedido p "
                . "LEFT JOIN "
                    . "status_pedido sp USING (id_status_pedido) "
                . "LEFT JOIN "
                    . "pessoa USING (id_pessoa) "
                . "WHERE "
                    . "p.id_pessoa = :id_pessoa");
        $sql->bindValue(":id_pessoa", $id_pessoa);
        $sql->execute();
        
        $array = array();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function getPedido($id_pedido) {
        $sql = $this->db->prepare(
                "SELECT "
                    . "pedido.id_pedido, "
                    . "pedido.dt_pedido, "
                    . "pedido.valor_final, "
                    . "pedido.observacao, "
                    . "status_pedido.nome AS status "
                . "FROM "
                    . "pedido "
                . "LEFT JOIN "
                    . "status_pedido USING (id_status_pedido) "
                . "WHERE "
                    . "id_pedido = :id_pedido");
        $sql->bindValue(":id_pedido", $id_pedido);
        $sql->execute();
        
        $array = array();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            $sql = $this->db->prepare(
                    "SELECT "
                        . "*, "
                        . "pizza.nome AS pizza, "
                        . "massa.nome AS massa "
                    . "FROM "
                        . "pizza_pedido "
                    . "LEFT JOIN "
                        . "pizza USING (id_pizza) "
                    . "LEFT JOIN "
                        . "massa USING (id_massa) "
                    . "WHERE "
                        . "id_pedido = :id_pedido");
            $sql->bindValue(":id_pedido", $id_pedido);
            $sql->execute();
            
            if ($sql->rowCount() > 0) {
                $pizza = $sql->fetchAll();
                $array['pizzas'] = $pizza;
            }
            
        }
        return $array;
    }
}
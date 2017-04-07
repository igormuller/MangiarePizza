<?php

class Pedido extends model {
    
    public function add($pessoa, $obs) {
        $comando = "INSERT INTO pedido SET dt_pedido = NOW(), valor_final = 0, ";
        if (!empty($obs)) {
            $comando .= "observacao = :observacao, ";
        }
        $comando .= "id_pessoa = :id_pessoa, id_status_pedido = 1";

        $sql = $this->db->prepare($comando);
        $sql->bindValue(":id_pessoa", $pessoa);
        if (!empty($obs)) {
            $sql->bindValue(":observacao", $obs);
        }
        $sql->execute();
        return $this->db->lastInsertId();
    }
    
    public function update($id_pedido, $obs) {
        $sql = $this->db->prepare("UPDATE pedido SET observacao = :observacao WHERE id_pedido = :id_pedido");
        $sql->bindValue(":id_pedido", $id_pedido);
        $sql->bindValue(":observacao", $obs);
        $sql->execute();
    }
    
    public function atualizaValor($id_pedido, $valor_final) {
        $sql = $this->db->prepare("UPDATE pedido SET valor_final = :valor_final WHERE id_pedido = :id_pedido");
        $sql->bindValue(":id_pedido", $id_pedido);
        $sql->bindValue(":valor_final", $valor_final);
        $sql->execute();
    }

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
    
   public function cancel($id_pedido) {
       $sql = $this->db->prepare("UPDATE pedido SET id_status_pedido = 7 WHERE id_pedido = :id_pedido");
       $sql->bindValue(":id_pedido", $id_pedido);
       $sql->execute();
   }


   public function getPedido($id_pedido) {
        $sql = $this->db->prepare(
                "SELECT "
                    . "pedido.*, "
                    . "status_pedido.nome AS status_pedido "
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
            
            $array['pizzas'] = array();
            if ($sql->rowCount() > 0) {
                $pizza = $sql->fetchAll();
                $array['pizzas'] = $pizza;
            }
            
        }
        return $array;
    }
}
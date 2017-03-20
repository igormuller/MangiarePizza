<?php

class Pedido extends model {
    
    private $data_pedido, $valor_final, $observacao, $id_status_pedido, $id_pessoa, $id_pedido;
    
    public function add() {
        $comando = "INSERT INTO pedido SET dt_pedido = NOW(), ";
        if (!empty($this->getObservacao())) {
            $comando .= "observacao = :observacao, ";
        }
        $comando .= "id_pessoa = :id_pessoa, id_status_pedido = :id_status_pedido";
        $sql = $this->db->prepare($comando);
        $sql->bindValue(":id_pessoa", $this->getId_pessoa());
        $sql->bindValue(":id_status_pedido", $this->getId_status_pedido());
        if (!empty($this->getObservacao())) {
            $sql->bindValue(":observacao", $this->getObservacao());
        }
        $sql->execute();
        return $this->db->lastInsertId();
    }
    
    public function getPedidos() {
        $sql = $this->db->prepare(""
                . "SELECT "
                    . "p.*, "
                    . "sp.nome as status_pedido, "
                    . "pessoa.nome as pessoa, "
                    . "(select sum(quantidade) from pizza_pedido where id_pedido = p.id_pedido) as total_pizza "
                . "FROM "
                    . "pedido p "
                . "LEFT JOIN "
                    . "status_pedido sp USING (id_status_pedido) "
                . "LEFT JOIN "
                    . "pessoa USING (id_pessoa)");
        $sql->execute();
        
        $array = array();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function getPedido($id_pedido) {
        $sql = $this->db->prepare("SELECT * FROM pedido WHERE id_pedido = :id_pedido");
        $sql->bindValue(":id_pedido", $id_pedido);
        $sql->execute();
        
        $array = array();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }
    
    public function getPedidoStatus($id_status_pedido) {
        $sql = $this->db->prepare("SELECT * FROM pedido WHERE id_status_pedido = :id_status_pedido");
        $sql->bindValue(":id_status_pedido", $id_status_pedido);
        $sql->execute();
        
        $array = array();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function update() {
        $comando = "UPDATE pedido SET ";
        if (!empty($this->getObservacao())) {
            $comando .= "observacao = :observacao, ";
        }
        $comando .= "id_pessoa = :id_pessoa, id_status_pedido = :id_status_pedido WHERE id_pedido = :id_pedido";
        $sql = $this->db->prepare($comando);
        $sql->bindValue(":id_pessoa", $this->getId_pessoa());
        $sql->bindValue(":id_status_pedido", $this->getId_status_pedido());
        $sql->bindValue(":id_pedido", $this->getId_pedido());
        if (!empty($this->getObservacao())) {
            $sql->bindValue(":observacao", $this->getObservacao());
        }
        $sql->execute();
    }
    
    public function remove($id_pedido) {
        $sql = $this->db->prepare("DELETE FROM pedido WHERE id_pedido = :id_pedido");
        $sql->bindValue(":id_pedido", $id_pedido);
        $sql->execute();
    }

    /*
     * Getters and Setters
     */
    function getId_pedido() {
        return $this->id_pedido;
    }

    function setId_pedido($id_pedido) {
        $this->id_pedido = $id_pedido;
    }

        function getData_pedido() {
        return $this->data_pedido;
    }

    function getValor_final() {
        return $this->valor_final;
    }

    function getObservacao() {
        return $this->observacao;
    }

    function getId_status_pedido() {
        return $this->id_status_pedido;
    }

    function getId_pessoa() {
        return $this->id_pessoa;
    }

    function setData_pedido($data_pedido) {
        $this->data_pedido = $data_pedido;
    }

    function setValor_final($valor_final) {
        $this->valor_final = $valor_final;
    }

    function setObservacao($observacao) {
        $this->observacao = $observacao;
    }

    function setId_status_pedido($id_status_pedido) {
        $this->id_status_pedido = $id_status_pedido;
    }

    function setId_pessoa($id_pessoa) {
        $this->id_pessoa = $id_pessoa;
    }


}
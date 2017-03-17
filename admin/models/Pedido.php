<?php

class Pedido extends model {
    
    private $data_pedido, $valor_final, $observacao, $id_status, $id_pessoa;
    
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

    /*
     * Getters and Setters
     */
    function getData_pedido() {
        return $this->data_pedido;
    }

    function getValor_final() {
        return $this->valor_final;
    }

    function getObservacao() {
        return $this->observacao;
    }

    function getId_status() {
        return $this->id_status;
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

    function setId_status($id_status) {
        $this->id_status = $id_status;
    }

    function setId_pessoa($id_pessoa) {
        $this->id_pessoa = $id_pessoa;
    }


}
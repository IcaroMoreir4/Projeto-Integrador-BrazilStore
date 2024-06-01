<?php
require_once(__DIR__ . '/../conexao.php');
require_once(__DIR__ . '/../../classes/comercio/pedido.php');

class PedidoDAO{



    public function create($pedido){
        $sql = 'INSERT INTO comecio.pedido (id, id_carrinho, data, status) VALUES (?, ?, ?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $pedido->getId());
        $stmt->bindValue(2, $pedido->getId_carrinho());
        $stmt->bindValue(3, $pedido->getData());
        $stmt->bindValue(4, $pedido->getStatus());
        $stmt->execute();
    }

    public function read($pedido){
        $sql = 'SELECT * FROM comercio.pedido';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function update($pedido){
        $sql = 'UPDATE comercio.loja SET Id = ?, Id_carrinho = ?, Data = ?, Status = ? WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $pedido->getId());
        $stmt->bindValue(2, $pedido->getId_carrinho());
        $stmt->bindValue(3, $pedido->getData());
        $stmt->bindValue(4, $pedido->getStatus());
        $stmt->execute();
    }
    
    public function delete($pedido){
        $sql = 'DELETE FROM comercio.pedido WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $pedido->getId());
        $stmt->execute();
    }


    public function listarPedidosPorCliente($id_cliente) {
    
        $sql = "SELECT * FROM pedido.pedido WHERE id_pedido = :id_cliente";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute(['id_cliente' => $id_cliente]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    }

    public function valor_pedido($total){
        $sql = 'INSERT INTO pedido.valor_pedido (total) values (?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $total);
        $stmt->execute();
    }

    public function atualizarFormaPagamento($forma_pagamento){
        $sql = 'INSERT INTO pedido.valor_pedido (forma_pagamento) values (?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $forma_pagamento);
        $stmt->execute();
    }

    public function create_pedido($valor, $forma_pagamento){
        $sql = 'INSERT INTO pedido.item_carrinho (valor, forma_pagamento) values (?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $valor);
        $stmt->bindValue(2, $forma_pagamento);
        $stmt->execute();
    }
}
    



?>
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

}
    






?>
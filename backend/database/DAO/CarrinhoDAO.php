<?php
require_once(__DIR__ . '/../conexao.php');
require_once(__DIR__ . '/../../classes/comercio/carrinho_item.php');

class CarrinhoDAO{
    // public function create(Carrinho $carrinho){
    //     $sql = 'INSERT INTO pedido.carrinho (id_cliente, id_produto, quantidade, tamanho, cor) values (?, ?, ?, ?, ?)';
    //     $stmt = Conexao::getConn()->prepare($sql);
    //     $stmt->bindValue(1, $carrinho->getId_cliente());
    //     $stmt->bindValue(2, $carrinho->getId_produto());
    //     $stmt->bindValue(3, $carrinho->getQuantidade());
    //     $stmt->bindValue(4, $carrinho->getTamanho());
    //     $stmt->bindValue(5, $carrinho->getCor());
    //     $stmt->execute();
    // }
    public function create(Carrinho $carrinho){
        $sql = 'INSERT INTO pedido.carrinho (id_cliente, id_produto, quantidade, tamanho, cor) values (?, ?, ?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);
        // $stmt->bindValue(1, $carrinho->getId_cliente());
        // $stmt->bindValue(2, $carrinho->getId_produto());
        // $stmt->bindValue(3, $carrinho->getQuantidade());
        // $stmt->bindValue(4, $carrinho->getTamanho());
        // $stmt->bindValue(5, $carrinho->getCor());
        // die($stmt->debugDumpParams());
        // die(var_dump((array)$carrinho));
        $stmt->execute([$carrinho->getId_cliente(), $carrinho->getId_produto(), $carrinho->getQuantidade(), $carrinho->getTamanho(), $carrinho->getCor()]);
        
    }
    
    public function read($id_cliente){
        $sql = 'SELECT * FROM  pedido.carrinho WHERE id_cliente = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute([$id_cliente]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function uptade(Carrinho $carrinho){
        $sql = 'UPDATE pedido.carrinho SET id_cliente = ?, id_produto = ?, quantidade = ?, tamanho = ?, cor = ? WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $carrinho->getId_cliente());
        $stmt->bindValue(2, $carrinho->getId_produto());
        $stmt->bindValue(3, $carrinho->getQuantidade());
        $stmt->bindValue(4, $carrinho->getTamanho());
        $stmt->bindValue(5, $carrinho->getCor());
        $stmt->bindValue(6, $carrinho->getId());
        $stmt->execute();
    }

    public function update_item($quantidade, $id){
        $sql = 'UPDATE pedido.carrinho SET quantidade = :quantidade WHERE id = :id';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function delete(Carrinho $carrinho){
        $sql = 'DELETE FROM  pedido.carrinho WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $carrinho->getId());
        $stmt->execute();
    }

    //Adicionar um produto ao carrinho com qauntidade (da tabela pedido.item_carrinho)
    public function create_item($id, $tamanho, $cor){
        $sql = 'INSERT INTO pedido.item_carrinho (id_produto, tamanho, cor) values (?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $tamanho);
        $stmt->bindValue(3, $cor);
        $stmt->execute();
    }

    public function getItensPorCliente($idCliente) {
        $sql = 'SELECT * FROM pedido.carrinho WHERE id_cliente = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute([$idCliente]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}

?>
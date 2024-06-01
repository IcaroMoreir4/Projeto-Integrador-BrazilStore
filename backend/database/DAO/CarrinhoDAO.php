<?php
require_once(__DIR__ . '/../conexao.php');
require_once(__DIR__ . '/../../classes/comercio/carrinho_item.php');

class CarrinhoDAO{
    public function create(Carrinho $carrinho){
        $sql = 'INSERT INTO pedido.carrinho (id_cliente, id_produto, quantidade, tamanho, cor) values (?, ?, ?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $carrinho->getId_cliente());
        $stmt->bindValue(2, $carrinho->getId_produto());
        $stmt->bindValue(3, $carrinho->getQuantidade());
        $stmt->bindValue(4, $carrinho->getTamanho());
        $stmt->bindValue(5, $carrinho->getCor());
        $stmt->execute();
    }

    public function read(){
        $sql = 'SELECT * FROM  pedido.carrinho WHERE id_cliente = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function uptade($id_cliente, $id_produto, $quantidade, $tamanho, $cor){
        $sql = 'UPDATE pedido.carrinho SET id_cliente = :id_cliente, id_produto = :id_produto, quantidade = :quantidade, tamanho = :tamanho, cor = :cor WHERE id = :id';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->bindValue(':id_produto', $id_produto, PDO::PARAM_INT);
        $stmt->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
        $stmt->bindValue(':tamanho', $tamanho, PDO::PARAM_STR);
        $stmt->bindValue(':cor', $cor, PDO::PARAM_STR);
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
}
?>
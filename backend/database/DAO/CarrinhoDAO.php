<?php

require_once(__DIR__ . '/../conexao.php');
require_once(__DIR__ . '/../../classes/comercio/carrinho_item.php');

class CarrinhoDAO{

    public function create(Carrinho $carrinho){
        $sql = 'INSERT INTO pedido.carrinho (id, id_item, id_cliente) values (?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $carrinho->getId_item());
        $stmt->bindValue(2, $carrinho->getId_cliente());
        $stmt->execute();
    }

    //Carrinho geral (da tabela pedido.carrinho)
    public function read(Carrinho $carrinho){
        $sql = 'SELECT * FROM  pedido.carrinho WHERE id_cliente = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function uptade(Carrinho $carrinho){
        $sql = 'UPTADE  pedido.carrinho SET id_item = ?, id_cliente = ?,
        where id = ? ';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $carrinho->getId_item());
        $stmt->bindValue(2, $carrinho->getId_cliente());

        $stmt->execute();
    }

    public function delete(Carrinho $carrinho){
        $sql = "DELETE FROM  pedido.carrinho WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $carrinho->getId());
        $stmt->execute();
    }

    //Adicionar um produto ao carrinho com qauntidade (da tabela pedido.item_carrinho)
    public function create_itemc(item_carrinho $item_carrinho){
        $sql = 'INSERT INTO pedido.item_carrinho (id_produto, quantidade) values (?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $item_carrinho->getId_produto());
        $stmt->bindValue(2, $item_carrinho->getQuantidade());
        $stmt->execute();
    }
}

?>
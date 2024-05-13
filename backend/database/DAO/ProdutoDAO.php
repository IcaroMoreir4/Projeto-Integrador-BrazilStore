<?php

require_once(__DIR__ . '/../conexao.php');
require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/produto.php');

class ProdutoDAO {
    public function create(Produto $produto) {
        $sql = 'INSERT INTO produto.produto (nome, categoria, valor, descricao) VALUES (?, ?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getCategoria());
        $stmt->bindValue(3, $produto->getValor());
        $stmt->bindValue(4, $produto->getDescricao());
        $stmt->execute();
    }
    
    public function read() {
        $sql = 'SELECT * FROM produto.produto';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function update(Produto $produto) {
        $sql = 'UPDATE produto.produto SET nome = ?, categoria = ?, valor = ?, descricao = ? WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getCategoria());
        $stmt->bindValue(3, $produto->getValor());
        $stmt->bindValue(4, $produto->getDescricao());
        $stmt->bindValue(5, $produto->getId());
        $stmt->execute();
    }

    public function delete(Produto $produto) {
        $sql = 'DELETE FROM produto.produto WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getId());
        $stmt->execute();
    }
}

?>

<?php 

require_once(__DIR__ . '/../conexao.php');
require_once("../projeto-pi/Projeto-Integrador-BrazilStore/backend/Classes/Loja/Produto.php"); //Esse diretorio ta correto?


class ProdutoDAO{

    public function create(Produto $produto){
        $sql = 'INSERT INTO produto.produto ($id,$nome,$id_categoria,$valor,$descricao,$id_loja ,$id_avaliacao VALUES (?,?,?,?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getId());
        $stmt->bindValue(2, $produto->getNome());
        $stmt->bindValue(3, $produto->getIdcategoria());
        $stmt->bindValue(4, $produto->getValor());
        $stmt->bindValue(5, $produto->getDescricao());
        $stmt->bindValue(6, $produto->getIdloja());
        $stmt->bindValue(7, $produto->getIdavaliacao());

        $stmt->execute();
    }
    
    public function read(Produto $produto){
        $sql = 'SELECT * FROM produto.produto';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function uptade(Produto $produto){
        $sql = 'UPTADE produto.produto SET id = ?,nome = ?,id_categoria = ?,valor = ?, descricao = ?,id_loja = ? , id_avaliacao = ? WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);

        $stmt->bindValue(1, $produto->getId());
        $stmt->bindValue(2, $produto->getNome());
        $stmt->bindValue(3, $produto->getIdcategoria());
        $stmt->bindValue(4, $produto->getValor());
        $stmt->bindValue(5, $produto->getDescricao());
        $stmt->bindValue(6, $produto->getIdloja());
        $stmt->bindValue(7, $produto->getIdavaliacao());

        $stmt->execute();

    }

    public function delete(Produto $produto){
        $sql = 'DELETE FROM produto.produto WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getId());
        $stmt->execute();
    }

}

?>
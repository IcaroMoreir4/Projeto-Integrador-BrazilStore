<?php 
require_once("Conexao.php");
require_once("../projeto-pi/Projeto-Integrador-BrazilStore/backend/Classes/Loja/Loja.php");



class LojaDao{
    public function create(Loja $loja){
        $sql = 'INSERT INTO comercio.loja ($id,$nome,$descricao,$id_vendedor,$id_avaliacao VALUES (?,?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $loja->getId());
        $stmt->bindValue(2, $loja->getNome());
        $stmt->bindValue(3, $loja->getDescricao());
        $stmt->bindValue(4, $loja->getIdvendedor());
        $stmt->bindValue(5, $loja->getIdavaliacao());

        $stmt->execute();
    }

    public function read(Loja $loja){
        $sql = 'SELECT * FROM comercio.loja';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function uptade(Loja $loja){
        $sql = 'UPTADE comercio.loja SET id = ?,nome = ?,descricao = ?,id_vendedor = ?,id_avaliacao = ? WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $loja->getId());
        $stmt->bindValue(2, $loja->getNome());
        $stmt->bindValue(3, $loja->getDescricao());
        $stmt->bindValue(4, $loja->getIdvendedor());
        $stmt->bindValue(5, $loja->getIdavaliacao());
        $stmt->execute();
    }

    public function delete(Loja $loja){
        $sql = 'DELETE FROM comercio.loja WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $loja->getId());
        $stmt->execute();
    }


}








?>
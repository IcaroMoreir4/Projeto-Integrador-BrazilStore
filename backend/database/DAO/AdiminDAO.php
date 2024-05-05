<?php 
require_once("Conexao.php");
require_once("Adimin.php");


class AdiminDAO{
    public function create(Adimin $adimin){
        $sql = 'INSERT INTO cliente ($email,$senha) values (?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $adimin->getEmail());
        $stmt->bindValue(3, $adimin->getSenha());
        $stmt->execute();
    }

    public function read (Adimin $adimin){
        $sql = "SELECT * FROM adimin";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function uptade(Adimin $adimin){
        $sql = "UPTADE adimin SET email = ?, senha = ? WHERE id =?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $adimin->getEmail());
        $stmt->bindValue(3, $adimin->getSenha());

        $stmt->execute();
    }

    public function delete(Adimin $adimin){
        $sql = "DELETE FROM adimin WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $adimin->getId());
        $stmt->execute();
    }

}





?>
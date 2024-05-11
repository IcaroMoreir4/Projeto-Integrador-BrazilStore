<?php 
require_once(__DIR__ . '/../conexao.php');
require_once(__DIR__ . '/../../classes/usuarios/admin.php');




class AdiminDAO{
    public function create(Admin $adimin){
        $sql = 'INSERT INTO usuario.adm ($email,$senha) values (?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $adimin->getEmail());
        $stmt->bindValue(2, $adimin->getSenha());
        $stmt->execute();
    }

    public function read (Admin $adimin){
        $sql = "SELECT * FROM usuario.adm";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function uptade(Admin $adimin){
        $sql = "UPTADE usuario.adm SET email = ?, senha = ? WHERE id =?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $adimin->getEmail());
        $stmt->bindValue(3, $adimin->getSenha());

        $stmt->execute();
    }

    public function delete(Admin $adimin){
        $sql = "DELETE FROM usuario.adm WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $adimin->getId());
        $stmt->execute();
    }

}





?>
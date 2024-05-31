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

    public function autenticar($email, $senha) {
        $sql = 'SELECT * FROM usuario.adm  WHERE email = :email AND senha = :senha';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            return $id_user = $row['id'];
        }
        return null;
    }

    public function VerTodosUsuario(){
        $sql = "SELECT * FROM usuario.cliente";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function VerTodosVendedores(){
        $sql = 'SELECT * FROM comercio.vendedor';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function VerTodasLojas(){
        $sql = 'SELECT * FROM comercio.loja';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}

?>
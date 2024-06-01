<?php

require_once(__DIR__ . '/../conexao.php');
require_once(__DIR__ . '/../../classes/usuarios/admin.php');

class AdiminDAO {
    public function create(Admin $admin) {
        $sql = 'INSERT INTO usuario.adm (email, senha) VALUES (?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $admin->getEmail());
        $stmt->bindValue(2, $admin->getSenha());
        $stmt->execute();
    }

    public function read(Admin $admin) {
        $sql = "SELECT * FROM usuario.adm";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function update(Admin $admin) {
        $sql = "UPDATE usuario.adm SET email = ?, senha = ? WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $admin->getEmail());
        $stmt->bindValue(2, $admin->getSenha());
        $stmt->bindValue(3, $admin->getId());
        $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM usuario.adm WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function autenticar($email, $senha) {
        $sql = 'SELECT * FROM usuario.adm WHERE email = :email AND senha = :senha';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            return $row['id'];
        }
        return null;
    }

    public function VerTodosUsuario() {
        $sql = "SELECT * FROM usuario.cliente";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function VerTodosVendedores() {
        $sql = 'SELECT * FROM comercio.vendedor';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function VerTodasLojas() {
        $sql = 'SELECT * FROM comercio.loja';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    

    

}
?>

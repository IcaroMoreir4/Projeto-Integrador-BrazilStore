<?php 

require_once(__DIR__ . '/../conexao.php');
require_once(__DIR__ . '/../../classes/usuarios/vendedor.php');


class VendedorDAO{
    public function create(Vendedor $vendedor){
        $sql = 'INSERT INTO comercio.vendedor(nome,email,senha,telefone,cpf) values (?,?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $vendedor->getNome());
        $stmt->bindValue(2, $vendedor->getEmail());
        $stmt->bindValue(3, $vendedor->getSenha());
        $stmt->bindValue(4, $vendedor->getTelefone());
        $stmt->bindValue(5, $vendedor->getCpf());
        $stmt->execute();

        return Conexao::getConn()->lastInsertId();
    }

    public function read(Vendedor $vendedor){
        $sql = 'SELECT * FROM comercio.vendedor';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function uptade(Vendedor $vendedor){
        $sql = 'UPTADE comercio.vendedor SET nome = ?, email = ?, senha = ?, telefone = ?, cpf = ?
        where id = ? ';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $vendedor->getNome());
        $stmt->bindValue(2, $vendedor->getEmail());
        $stmt->bindValue(3, $vendedor->getSenha());
        $stmt->bindValue(4, $vendedor->getTelefone());
        $stmt->bindValue(5, $vendedor->getCpf());
        $stmt->bindValue(6, $vendedor->getId());

        $stmt->execute();
    }

    public function delete(Vendedor $vendedor){
        $sql = "DELETE FROM comercio.vendedor WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $vendedor->getId());
        $stmt->execute();
    }

    public function autenticar($email, $senha) {
        $sql = 'SELECT * FROM comercio.vendedor WHERE email = ? AND senha = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $senha);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function exists($id) {
        $sql = 'SELECT COUNT(*) AS count FROM comercio.vendedor WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }

}

?>
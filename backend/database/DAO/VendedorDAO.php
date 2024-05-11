<?php 

require_once(__DIR__ . '/../conexao.php');
require_once(__DIR__ . '/../../classes/usuarios/vendedor.php');


class VendedorDAO{
    public function create(Vendedor $vendedor){
        $sql = 'INSERT INTO comercio.vendedor($id,$nome,$email,$senha,$telefone,$cpf,$endereco) values (?,?,?,?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $vendedor->getNome());
        $stmt->bindValue(2, $vendedor->getEmail());
        $stmt->bindValue(3, $vendedor->getSenha());
        $stmt->bindValue(4, $vendedor->getTelefone());
        $stmt->bindValue(5, $vendedor->getCpf());
        $stmt->bindValue(6, $vendedor->getId_endereco());
        $stmt->execute();
    }

    public function read(Vendedor $vendedor){
        $sql = 'SELECT * FROM comercio.vendedor';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function uptade(Vendedor $vendedor){
        $sql = 'UPTADE comercio.vendedor SET nome = ?, email = ?, senha = ?, telefone = ?, cpf = ?, 
        endereco = ?
        where id = ? ';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $vendedor->getNome());
        $stmt->bindValue(2, $vendedor->getEmail());
        $stmt->bindValue(3, $vendedor->getSenha());
        $stmt->bindValue(4, $vendedor->getTelefone());
        $stmt->bindValue(5, $vendedor->getCpf());
        $stmt->bindValue(6, $vendedor->getId_endereco());
        $stmt->bindValue(7, $vendedor->getId());

        $stmt->execute();
    }

    public function delete(Vendedor $vendedor){
        $sql = "DELETE FROM comercio.vendedor WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $vendedor->getId());
        $stmt->execute();
    }

}







?>
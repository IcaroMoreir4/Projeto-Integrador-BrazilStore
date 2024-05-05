<?php 
require_once("Conexao.php");
require_once("Cliente.php");

class ClienteDAO{

    public function create(Cliente $cliente){
        $sql = 'INSERT INTO cliente ($id,$nome,$email,$senha,$telefone,$cpf,$endereco) values (?,?,?,?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $cliente->getNome());
        $stmt->bindValue(2, $cliente->getEmail());
        $stmt->bindValue(3, $cliente->getSenha());
        $stmt->bindValue(4, $cliente->getTelefone());
        $stmt->bindValue(5, $cliente->getCpf());
        $stmt->bindValue(6, $cliente->getEndereco());
        $stmt->execute();
    }

    public function read(Cliente $cliente){
        $sql = 'SELECT * FROM cliente';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function uptade(Cliente $cliente){
        $sql = 'UPTADE cliente SET nome = ?, email = ?, senha = ?, telefone = ?, cpf = ?, endereco = ?
        where id = ? ';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $cliente->getNome());
        $stmt->bindValue(2, $cliente->getEmail());
        $stmt->bindValue(3, $cliente->getSenha());
        $stmt->bindValue(4, $cliente->getTelefone());
        $stmt->bindValue(5, $cliente->getCpf());
        $stmt->bindValue(6, $cliente->getEndereco());
        $stmt->bindValue(7, $cliente->getId());

        $stmt->execute();
    }

    public function delete(Cliente $cliente){
        $sql = "DELETE FROM cliente WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $cliente->getId());
        $stmt->execute();
    }


}




?>
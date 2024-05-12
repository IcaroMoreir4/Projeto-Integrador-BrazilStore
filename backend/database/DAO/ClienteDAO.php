<?php 
require_once(__DIR__ . '/../conexao.php');
require_once(__DIR__ . '/../../classes/usuarios/cliente.php');

class ClienteDAO{

    public function create(Cliente $cliente){
        $sql = 'INSERT INTO usuario.cliente (nome,email,senha,telefone,cpf,id_endereco) values (?,?,?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $cliente->getNome());
        $stmt->bindValue(2, $cliente->getEmail());
        $stmt->bindValue(3, $cliente->getSenha());
        $stmt->bindValue(4, $cliente->getTelefone());
        $stmt->bindValue(5, $cliente->getCpf());
        $stmt->bindValue(6, $cliente->getId_endereco());
        $stmt->execute();
    }
    

    public function read(Cliente $cliente){
        $sql = 'SELECT * FROM  usuario.cliente';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function uptade(Cliente $cliente){
        $sql = 'UPTADE  usuario.cliente SET nome = ?, email = ?, senha = ?, telefone = ?, cpf = ?, id_endereco = ?
        where id = ? ';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $cliente->getNome());
        $stmt->bindValue(2, $cliente->getEmail());
        $stmt->bindValue(3, $cliente->getSenha());
        $stmt->bindValue(4, $cliente->getTelefone());
        $stmt->bindValue(5, $cliente->getCpf());
        $stmt->bindValue(6, $cliente->getId_endereco());
        $stmt->bindValue(7, $cliente->getId());

        $stmt->execute();
    }

    public function delete(Cliente $cliente){
        $sql = "DELETE FROM  usuario.cliente WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $cliente->getId());
        $stmt->execute();
    }


    //Metodo autenticar
    public function autenticar($email, $senha) {
        $sql = 'SELECT * FROM usuario.cliente WHERE email = ? AND senha = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $senha);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    


}




?>
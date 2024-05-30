<?php 

require_once(__DIR__ . '/../conexao.php');
require_once(__DIR__ . '/../../classes/usuarios/cliente.php');

class ClienteDAO{

    public function create(Cliente $cliente){
        $sql = 'INSERT INTO usuario.cliente (nome,email,senha,telefone,cpf) values (?,?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $cliente->getNome());
        $stmt->bindValue(2, $cliente->getEmail());
        $stmt->bindValue(3, $cliente->getSenha());
        $stmt->bindValue(4, $cliente->getTelefone());
        $stmt->bindValue(5, $cliente->getCpf());
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
        $stmt->execute();
    }

    public function delete(Cliente $cliente){
        $sql = "DELETE FROM  usuario.cliente WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $cliente->getId());
        $stmt->execute();
    }
/*
    //Metodo autenticar
    public function autenticar($email, $senha) {
        $sql = 'SELECT * FROM usuario.cliente WHERE email = ? AND senha = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $senha);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
*/

    //Teste de função para colocar o id no session_start.
    public function autenticar($email, $senha) {
        $sql = 'SELECT * FROM usuario.cliente WHERE email = :email AND senha = :senha';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha); // Assumindo que a senha está armazenada em plain text (não recomendado, use hashing)
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            return $id_user = $row['id'];
        }
        return null;
    }

    public function session_id($id) {
        $sql = 'SELECT * FROM usuario.cliente WHERE id = :id';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new cliente($row['id'], $row['nome'], $row['email'],  $row['cpf'], $row[null], $row['telefone']);
        }
        return null;
    }

    //Consulta de pedidos
    public function queryrequests($cliente){
        $sql = 'SELECT pedido.pedido.*, pedido.carrinho.id, pedido.carrinho.id_cliente FROM pedido.pedido INNER JOIN pedido.carrinho ON pedido.pedido.id_carrinho = pedido.carrinho.id;
        WHERE id_cliente = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}

?>
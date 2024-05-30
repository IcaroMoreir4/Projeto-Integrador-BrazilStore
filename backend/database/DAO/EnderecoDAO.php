<?php 
require_once(__DIR__ . '/../conexao.php');
require_once(__DIR__ . '/../../classes/usuarios/endereco.php');

class EnderecoDAO{
    public function create(Endereco $endereco){
        $sql = 'INSERT INTO usuario.endereco (id_cliente, nome_comp, telefone_end, logradouro, numero, bairro, cep, nome_cidade, nome_estado) values (?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $endereco->getId_cliente());
        $stmt->bindValue(2, $endereco->getNome_comp());
        $stmt->bindValue(3, $endereco->getTelefone_end());
        $stmt->bindValue(4, $endereco->getLogradouro());
        $stmt->bindValue(5, $endereco->getNumero());
        $stmt->bindValue(6, $endereco->getBairro());
        $stmt->bindValue(7, $endereco->getCep());
        $stmt->bindValue(8, $endereco->getNome_cidade());
        $stmt->bindValue(9, $endereco->getNome_estado());
        $stmt->execute();
    }

    public function read($userId){
        $sql = "SELECT DISTINCT usuario.endereco.* FROM usuario.endereco INNER JOIN usuario.cliente ON usuario.endereco.id_cliente = usuario.cliente.id WHERE usuario.cliente.id = :user_id";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(Endereco $endereco){
        $sql = "UPDATE usuario.endereco SET nome_comp = ?, telefone_end = ?, logradouro = ?, numero = ?, bairro = ?, cep = ?, nome_cidade = ?, nome_estado = ? WHERE id_cliente = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $endereco->getNome_comp());
        $stmt->bindValue(2, $endereco->getTelefone_end());
        $stmt->bindValue(3, $endereco->getLogradouro());
        $stmt->bindValue(4, $endereco->getNumero());
        $stmt->bindValue(5, $endereco->getBairro());
        $stmt->bindValue(6, $endereco->getCep());
        $stmt->bindValue(7, $endereco->getNome_cidade());
        $stmt->bindValue(8, $endereco->getNome_estado());
        $stmt->execute();
    }

    public function delete(Endereco $endereco){
        $sql = "DELETE FROM  usuario.endereco WHERE id_cliente = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $endereco->getId());
        $stmt->execute();
    }
}
?>
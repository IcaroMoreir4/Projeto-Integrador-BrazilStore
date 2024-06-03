<?php 
require_once(__DIR__ . '/../conexao.php');
require_once(__DIR__ . '/../../classes/usuarios/endereco.php');

class EnderecoDAO{
    //Função para cadastra um novo endereço.
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

    //Função para consultar os endereços cadastrados.
    public function read($userId){
        $sql = 'SELECT DISTINCT usuario.endereco.* FROM usuario.endereco INNER JOIN usuario.cliente ON usuario.endereco.id_cliente = usuario.cliente.id WHERE usuario.cliente.id = :user_id';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    //Função para atualizar os endereços cadastrados.
    public function update($id, $nome_comp, $telefone_end, $logradouro, $numero, $bairro, $cep, $nome_cidade, $nome_estado){
        $sql = 'UPDATE usuario.endereco SET nome_comp = :nome_comp, telefone_end = :telefone_end, logradouro = :logradouro, numero = :numero, bairro = :bairro, cep = :cep, nome_cidade = :nome_cidade, nome_estado = :nome_estado WHERE id = :id';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(':nome_comp', $nome_comp, PDO::PARAM_STR);
        $stmt->bindValue(':telefone_end', $telefone_end, PDO::PARAM_STR);
        $stmt->bindValue(':logradouro', $logradouro, PDO::PARAM_STR);
        $stmt->bindValue(':numero', $numero, PDO::PARAM_INT);
        $stmt->bindValue(':bairro', $bairro, PDO::PARAM_STR);
        $stmt->bindValue(':cep', $cep, PDO::PARAM_INT);
        $stmt->bindValue(':nome_cidade', $nome_cidade, PDO::PARAM_STR);
        $stmt->bindValue(':nome_estado', $nome_estado, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    //Função para excluir os endereços cadastrados.
    public function delete($id){
        $sql = 'DELETE FROM  usuario.endereco WHERE id = :id';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
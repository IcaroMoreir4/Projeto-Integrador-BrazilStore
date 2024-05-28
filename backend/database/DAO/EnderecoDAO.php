<?php 

require_once(__DIR__ . '/../conexao.php');
require_once(__DIR__ . '/../../classes/usuarios/endereco.php');


class EnderecoDAO{
    
    //Cadastra o Endereço (PK).
    public function create(Endereco $endereco){
        $sql = 'INSERT INTO usuario.endereco (logradouro, numero, bairro,	cep, nome_cidade, nome_estado) values (?, ?, ?, ?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $endereco->getLogradouro());
        $stmt->bindValue(2, $endereco->getNumero());
        $stmt->bindValue(3, $endereco->getBairro());
        $stmt->bindValue(4, $endereco->getCep());
        $stmt->bindValue(5, $endereco->getNome_cidade());
        $stmt->bindValue(6, $endereco->getNome_estado());
        $stmt->execute();
    }

    //Apresentação na aba de "Meus Endereços".
    public function read($id){
        $sql = "SELECT usuario.endereco.*
        FROM usuario.endereco 
        INNER JOIN usuario.cliente ON usuario.endereco.id_cliente = usuario.cliente.id
        WHERE usuario.cliente.id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(Endereco $endereco){
        $sql = "UPDATE usuario.endereco SET logradouro = ?, numero = ?, bairro = ?, cep = ?, id_cidadE = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $endereco->getLogradouro());
        $stmt->bindValue(2, $endereco->getNumero());
        $stmt->bindValue(3, $endereco->getBairro());
        $stmt->bindValue(4, $endereco->getCep());
        $stmt->bindValue(5, $endereco->getNome_cidade());
        $stmt->bindValue(6, $endereco->getNome_estado());
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
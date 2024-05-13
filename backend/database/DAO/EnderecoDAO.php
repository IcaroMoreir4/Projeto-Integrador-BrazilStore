<?php 

require_once(__DIR__ . '/../conexao.php');
require_once(__DIR__ . '/../../classes/usuarios/endereco.php');


class EnderecoDAO{
    
    public function create(Endereco $Endereco){
        $sql = 'INSERT INTO endereco.endereco (logradouro, numero, bairro,	cep, id_cidade) values (?,?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $endereco->getLogradouro());
        $stmt->bindValue(2, $endereco->getNumero());
        $stmt->bindValue(3, $endereco->getBairro());
        $stmt->bindValue(4, $endereco->getBairro());
        $stmt->bindValue(5, $endereco->getCep());
        $stmt->bindValue(6, $endereco->getId_cidade());
        $stmt->execute();
    }

    public function read(Endereco $Endereco){
        $sql = "SELECT * FROM endereco.endereco";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function update(Endereco $Endereco){
        $sql = "UPDATE endereco.endereco SET logradouro = ?, numero = ?, bairro = ?, cep = ?, id_cidadE = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $endereco->getLogradouro());
        $stmt->bindValue(2, $endereco->getNumero());
        $stmt->bindValue(3, $endereco->getBairro());
        $stmt->bindValue(4, $endereco->getBairro());
        $stmt->bindValue(5, $endereco->getCep());
        $stmt->bindValue(6, $endereco->getId_cidade());
        $stmt->execute();
    }

    public function delete(Endereco $Endereco){
        $sql = "DELETE FROM  endereco.endereco WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $endereco->getId());
        $stmt->execute();
    }

}

?>
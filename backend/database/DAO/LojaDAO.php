<?php 

require_once(__DIR__ . '/../conexao.php');
require_once(__DIR__ . '/../../classes/comercio/loja.php');

class LojaDao{
    public function create(Loja $loja){
        $sql = 'INSERT INTO comercio.loja (nome, descricao, email, senha, id_vendedor) VALUES (?, ?, ?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $loja->getNome());
        $stmt->bindValue(2, $loja->getDescricao());
        $stmt->bindValue(3, $loja->getEmail());
        $stmt->bindValue(4, $loja->getSenha());
        $stmt->bindValue(5, $loja->getIdvendedor());
        $stmt->execute();
    }

    public function read(Loja $loja){
        $sql = 'SELECT * FROM comercio.loja';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function update(Loja $loja){
        $sql = 'UPDATE comercio.loja SET nome = ?, descricao = ?, email = ?, senha = ?, id_vendedor = ?, id_avaliacao = ? WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $loja->getNome());
        $stmt->bindValue(2, $loja->getDescricao());
        $stmt->bindValue(3, $loja->getEmail());
        $stmt->bindValue(4, $loja->getSenha());
        $stmt->bindValue(5, $loja->getIdvendedor());
        $stmt->bindValue(6, $loja->getIdavaliacao());
        $stmt->bindValue(7, $loja->getId());
        $stmt->execute();
    }

    public function delete(Loja $loja){
        $sql = 'DELETE FROM comercio.loja WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $loja->getId());
        $stmt->execute();
    }

    public function autenticar($email, $senha) {
        $sql = 'SELECT * FROM comercio.loja WHERE email = ? AND senha = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $senha);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

}

?>

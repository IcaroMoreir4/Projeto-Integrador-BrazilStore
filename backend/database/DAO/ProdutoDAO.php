
<?php

require_once(__DIR__ . '/../conexao.php');
require_once('../Projeto-Integrador-BrazilStore/backend/classes/comercio/produto.php');
require_once('../Projeto-Integrador-BrazilStore/backend/database/DAO/ProdutoDAO.php');

class ProdutoDAO {
    public function create(Produto $produto) {
        $sql = 'INSERT INTO produto.produto (nome, categoria, valor, descricao) VALUES (?, ?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getIdcategoria());
        $stmt->bindValue(3, $produto->getValor());
        $stmt->bindValue(4, $produto->getDescricao());
        $stmt->execute();
    }
    
    public function read() {
        $sql = 'SELECT * FROM produto.produto';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function query($produto){
        $sql = "SELECT * FROM produto.produto WHERE LOWER(pesquisa) LIKE LOWER(:pesquisa)";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute(['pesquisa' => '%' . $produto . '%']);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } //Pesquisa da barra de pesquisa (pelo nome).

    public function update(Produto $produto) {
        $sql = 'UPDATE produto.produto SET nome = ?, categoria = ?, valor = ?, descricao = ? WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getIdcategoria());
        $stmt->bindValue(3, $produto->getValor());
        $stmt->bindValue(4, $produto->getDescricao());
        $stmt->bindValue(5, $produto->getId());
        $stmt->execute();
    }

    public function delete(Produto $produto) {
        $sql = 'DELETE FROM produto.produto WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getId());
        $stmt->execute();
    }

    public function presentation($produto){
        $sql = "SELECT produto.produto.*, avaliacao.avaliacao_produto.*
        FROM produto.produto 
        INNER JOIN avaliacao.avaliacao_produto ON produto.produto.id = avaliacao.avaliacao_produto.id_produto;
        ";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute(['presentation' => '%' . $produto . '%']);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } // Apresentação do produto individual

    /* Não sei como vou juntar os dados que o front precisa para apresentar a home
    public function home($produto){
        $sql = "SELECT nome.produto.produto, valor.produto.produto, COUNT (id_avaliacao)  FROM produto.produto";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute(['pesquisa' => '%' . $produto . '%']);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    */

    public function category($produto){
        $sql = "SELECT nome FROM produto.categoria";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute(['category' => '%' . $produto . '%']);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } //Para apresentar as categorias que estão ma home
}

?>

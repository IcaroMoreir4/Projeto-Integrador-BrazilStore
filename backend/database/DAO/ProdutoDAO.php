
<?php

require_once(__DIR__ . '/../conexao.php');
require_once('../backend/classes/comercio/produto.php');

class ProdutoDAO {
    // public function create(Produto $produto) {
    //     $sql = ' ';
    //     $stmt = Conexao::getConn()->prepare($sql);
    //     $stmt->bindValue(1, $produto->getNome());
    //     $stmt->bindValue(2, $produto->getIdcategoria());
    //     $stmt->bindValue(3, $produto->getValor());
    //     $stmt->bindValue(4, $produto->getDescricao());
    //     $stmt->bindValue(5, $produto->getPeso());
    //     $stmt->bindValue(6, $produto->getTamanho());
    //     $stmt->bindValue(7, $produto->getCor());
    //     $stmt->bindValue(8, $produto->getTipoEentrega());
    //     $stmt->execute();
    // }
    
    public function read() {
        $sql = 'SELECT * FROM produto.produto';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function update(Produto $produto) {
        $sql = 'UPDATE produto.produto SET nome = ?, categoria = ?, valor = ?, descricao = ?, peso =?, tipo_entrega = ? WHERE id = ?';
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

    //Barra de pesquisa
    public function query($consulta) {
        $consulta = '%' . $consulta . '%'; // Adiciona % para busca parcial
        $stmt = Conexao::getConn()->prepare('SELECT nome, valor FROM produto.produto WHERE nome LIKE :consulta');
        $stmt->bindParam(':consulta', $consulta);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Apresentação do produto individual.
    public function presentation($produto){
        $sql = "SELECT produto.produto.*, avaliacao.avaliacao_produto.*
        FROM produto.produto 
        INNER JOIN avaliacao.avaliacao_produto ON produto.produto.id = avaliacao.avaliacao_produto.id_produto
        WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Produtos apresentados na tela inicial do site.
    public function home_produto($produto){
        $sql = "SELECT nome.produto.produto, valor.produto.produto FROM produto.produto";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function home_avaliacao($produto){
        $sql = "SELECT AVG avaliacao.avaliacao_produto.quant_estrela FROM avaliacao.avaliacao_produto INNER JOIN produto.produto ON avaliacao.avaliacao_produto.id_produto = produto.produto.id WHERE id_produto = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function home_pedidos($produto){
        $sql = "SELECT SUM pedido.item_carrinho.quantidade FROM pedido.item_carrinho INNER JOIN produto.produto ON pedido.item_carrinho.quantidade.id_produto = produto.produto.id WHERE id_produto = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    //Fazer uma consulta das categorias cadastradas para apresentar na home.
    public function category($produto){ 
        $sql = "SELECT nome FROM produto.categoria";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AdicionarProduto(Produto $produto) {
        $sql = 'INSERT INTO produto.produto (nome, categoria, valor, descricao, peso, tipo_entrega, id_vendedor) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getIdcategoria());
        $stmt->bindValue(3, $produto->getValor());
        $stmt->bindValue(4, $produto->getDescricao());
        $stmt->bindValue(5, $produto->getPeso());
        $stmt->bindValue(6, $produto->getTipoEentrega());
        $stmt->bindValue(7, $produto->getIdvendedor());
        $stmt->execute();
    }

    
    public function listarProdutosPorVendedor($id_vendedor) {
    
        $sql = "SELECT * FROM produto.produto WHERE id_vendedor = :id_vendedor";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute(['id_vendedor' => $id_vendedor]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function create(Produto $produto, $image) {
        $sql = 'INSERT INTO produto.produto (nome, categoria, valor, descricao, peso, tipo_entrega, image_path) VALUES (?, ?, ?, ?, ?, ?, ?,)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getIdcategoria());
        $stmt->bindValue(3, $produto->getValor());
        $stmt->bindValue(4, $produto->getDescricao());
        $stmt->bindValue(5, $produto->getPeso());
        $stmt->bindValue(7, $produto->getTipoEentrega());
        $stmt->bindValue(8, $image);
        $stmt->execute();
    }
    
}

?>
